<template>
  <div>
<h1>Home</h1>
<p >{{currentUser.email}}</p>
  </div>
  <button @click="logout" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Logout
            </button>
</template>


<script>
import axios from 'axios'

export default{
  data(){
    return{
      pets: [], 
      currentUser: {},
      token: localStorage.getItem('token')     
    }
  },
  mounted(){
    window.axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
    this.getPets();
    axios.get('http://127.0.0.1:8000/api/user').then((response) => {
        this.currentUser = response.data
    }).catch((errors) => {
        console.log(errors)
    })
    
  console.log('Token:', this.token);
  },
  methods: {
    getPets(){
      axios.get('http://127.0.0.1:8000/api/pets')
      .then((response) => {
        this.pets = response.data;
        console.log(response.data);
      })
      .catch((error) => {    
        console.error(error);
      });

    },
      logout(){
          axios.post('http://127.0.0.1:8000/api/logout').then((response) => {
              localStorage.removeItem('token')
              this.$router.push('/login')
          }).catch((errors) => {
              console.log(errors)
          })
      }
  }
}
</script>

<style lang="scss" scoped>

</style>