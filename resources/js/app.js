import './bootstrap';
import { createApp } from 'vue';
import App from '../js/components/App.vue'
import router from './router';

// function isLoggedIn(){
//     return localStorage.getItem('token')

// }

function loggedIn(){
    return localStorage.getItem('token')

}


// router.beforeEach((to, from) => {
//     // instead of having to check every route record with
//     // to.matched.some(record => record.meta.requiresAuth)
//     if (to.meta.requiresAuth && !isLoggedIn()) {
//       // this route requires auth, check if logged in
//       // if not, redirect to login page.
//       return {
//         path: '/login',
//         // save the location we were at to come back later
//         query: { redirect: to.fullPath },
//       }
//     }
//   })

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!loggedIn()) {
            next({
            path: '/login',
            query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else if(to.matched.some(record => record.meta.guest)) {
        if (loggedIn()) {
            next({
            path: '/',
            query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }
})

createApp(App).use(router).mount('#app')
