<template>
    <div class="w-full max-w-xs ml-80" >
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Enter your name" name="name" v-model="formData.name">
                <p class="text-red-700" v-text="errors.name"></p>
            </div>
            

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Enter your email" name="email" v-model="formData.email">
                <p class="text-red-700" v-text="errors.email"></p>    
            </div>
            
           
            <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Enter your passsword" name="password" v-model="formData.password">
            <p class="text-red-700" v-text="errors.password"></p>
            </div>

            <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password Confirmation
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" type="password_confirmation" placeholder="Re-Enter your password" name="password_confirmation" v-model="formData.password_confirmation">
            <p class="text-red-700" v-text="errors.password"></p>
           </div>
            <div class="flex items-center justify-between">
            <button @click="registerUser" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Register
            </button>
            <router-link to="/login" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                Have an account?
            </router-link>
            </div>
        </form>
  
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data(){
        return{
            formData: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                },
                errors: {}
        }
    },
    methods: {
        registerUser(){
            axios.post('http://127.0.0.1:8000/api/register', this.formData).then((response) => {
                    console.log(response.data)
                    this.formData.name = this.formData.email = this.formData.password = this.formData.password_confirmation = ''
                    this.errors = {}
                    this.$router.push('/login')
                  
                }).catch((errors) => {
                    this.errors = errors.response.data.errors
                    console.log(errors.response.data.errors)
                }); 
        }
    }
}
</script>

<style scoped>

</style>