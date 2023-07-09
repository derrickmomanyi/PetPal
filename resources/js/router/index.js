import { createRouter, createWebHashHistory} from 'vue-router'
import Home from '../components/Home.vue'
import About from '../components/About.vue'
import AddPet from '../components/AddPet.vue'
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'

const routes = [ 
    {
        path: '/',
        name: 'Home',
        component: Home,
        meta: {requiresAuth: true} 
    },
    {
        path: '/about',
        name: 'About',
        component: About, 
        meta: {guest: true}
    },
    {
        path: '/addpet',
        name: 'AddPet',
        component: AddPet, 
        meta: {requiresAuth: true}
    },
    {
        path: '/login',
        name: 'Login',
        component: Login,
        meta: {guest: true}
    },
    {
        path: '/register',
        name: 'Register',
        component: Register,
        meta: {guest: true}
    }
]


const router = createRouter({
    history: createWebHashHistory(),
    routes
  })
  
  export default router