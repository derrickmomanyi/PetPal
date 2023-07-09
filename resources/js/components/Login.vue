<template>
    <div class="w-full max-w-xs ml-80" >
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Enter your email" v-model="formData.email">
            </div>
            <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="********"  v-model="formData.password">
            <!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
            </div>
            <div class="flex items-center justify-between">
            <button @click="login" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Login
            </button>
            <router-link to="/register" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" >
                Don't have an account?
            </router-link>
            </div>
        </form>
  
    </div>
</template>

<script>
import axios from 'axios'
 export default {
        data(){
            return {
                formData: {
                    email: '',
                    password: '',
                    device_name: 'browser'
                },
                errors: {}
            }
        },
        methods: {
            login(){
                axios.post('http://127.0.0.1:8000/api/login', this.formData).then((response) => {                   
                    localStorage.setItem('token', response.data.token)   
                    this.$router.push('/')
                    console.log(response.data);
                }).catch((errors) => {
                    // this.errors = errors
                    console.log(errors);
                })
            }
        }

       
    }
</script>

<style lang="scss" scoped>

</style>