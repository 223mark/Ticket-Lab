import { createRouter, createWebHistory } from 'vue-router'


//frontend
import AppMaster from '../components/AppMaster.vue'
import HomePage from '../views/MainPage.vue'
import Operators from '../views/operators/Operators.vue'
import OperatorDetail from '../views/operators/Detail.vue'
import Ticket from '../views/tickets/Tickets.vue'
import Process from '../views/order/Process.vue'
import Checkout from '../views/order/OrderCheckout.vue'
import AboutUs from '../views/aboutus/AboutUs.vue'
const routes = [{
        path: '/home',
        name: 'app',
        component: AppMaster,
        children: [{
                path: '/',
                name: 'app.home',
                component: HomePage,
                // BeforeEach: ((to, from, next) => {
                //     console.log(from);
                //     console.log(to);
                //     if (from.name == 'app.home') {
                //         next({ name: 'Ticket' })
                //     } else {
                //         next({ name: 'app.home' })
                //     }

                // })

            },
            {
                path: '/tickets/:f/:t/:d',
                name: 'app.tickets',
                component: Ticket
            },
            {
                path: '/seats/:ticketCode/:date',
                name: 'app.seats',
                component: Process
            },
            {
                path: '/checkout/:ticketId/:date',
                name: 'app.checkout',
                component: Checkout
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
                path: '/about-us',
                name: 'app.about-us',
                component: AboutUs
            },

            {
                path: '/:pathMatch(.*)',
                component: HomePage,
            }


        ]
    },





];


const router = createRouter({
    history: createWebHistory(),
    routes
});

// router.beforeEach((to, from, next) => {
//     if (to.name == 'app.home') {
//         next({ name: 'Ticket' })
//     } else {
//         next({ name: 'app.home' })
//     }

// });


export default router;