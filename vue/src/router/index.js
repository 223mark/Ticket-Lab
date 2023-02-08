import { createRouter, createWebHistory } from 'vue-router'
//auth sectuin
import AuthLayout from '../components/AuthLayout.vue'
import Register from '../views/auth/Register.vue'
//import ResetPassword from '../views/auth/ResetPassword.vue'
import Login from '../views/auth/Login.vue'


// //admin
// import Admin from '../components/MasterLayout/AdminMaster.vue'
// import Dashboard from '../views/admin/Dashboard.vue'
// import Tickets from '../views/admin/Tickets.vue'
// import AdminOperators from '../views/admin/Operators.vue'
// import Trip from '../views/admin/Trip.vue'



//frontend
import AppMaster from '../components/AppMaster.vue'
import HomePage from '../views/MainPage.vue'
import Operators from '../views/operators/Operators.vue'
import OperatorDetail from '../views/operators/Detail.vue'
import Ticket from '../views/tickets/Tickets.vue'
import Process from '../views/order/Process.vue'
import ProcessTwo from '../views/ProcessTwo.vue'
import Blog from '../views/blog/Blog.vue'
import AboutUs from '../views/aboutus/AboutUs.vue'
const routes = [{
        path: '/',
        name: 'app',
        component: AppMaster,
        meta: {
            requiresAuth: true
        },
        children: [{
                path: '/',
                name: 'app.home',
                component: HomePage
            },

            {
                path: '/operators',
                name: 'app.operators',
                component: Operators
            },
            {
                path: '/operators/:operator',
                name: 'app.operators.detail',
                component: OperatorDetail
            },
            {
                path: '/blog',
                name: 'app.blog',
                component: Blog
            },
            {
                path: '/about-us',
                name: 'app.about-us',
                component: AboutUs
            },
            {
                path: '/tickets/search',
                name: 'Ticket',
                component: Ticket
            },
            {
                path: '/process',
                name: 'Processing',
                component: Process
            },
            {
                path: '/process/two',
                name: 'Processing2',
                component: ProcessTwo
            },


        ]
    },
    {
        path: '/auth',
        name: 'auth',
        component: AuthLayout,
        children: [{
                path: '/login',
                name: 'auth.login',
                component: Login
            },
            {
                path: '/register',
                name: 'auth.register',
                component: Register

            },
            // {
            //     path: '/reset/password',
            //     name: 'resetPassword',
            //     component: ResetPassword
            // }
        ]
    },



];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;