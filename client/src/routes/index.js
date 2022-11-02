import * as VueRouter from 'vue-router';
import store from '../store';
import Home from '../pages/Home.vue';
import PageNotFound from '../pages/PageNotFound.vue';
const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
    },

    // {
    //     path: '/:catchAll(.*)',
    //     redirect: '/login',
    // },
    {
        path: '/:catchAll(.*)',
        name: 'PageNotFound',
        component: PageNotFound,
    },
];
const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
});

// check auth
// router.beforeEach((to, from, next) => {
//     if (to.fullPath === '/') {
//         if (!store.state.moduleAuthor.currentUser?.username) {
//             next('/login');
//             return;
//         }
//     } else if (to.fullPath === '/todos') {
//         if (!store.state.moduleAuthor.currentUser?.username) {
//             next('/login');
//             return;
//         }
//     } else if (to.fullPath === '/login') {
//         if (store.state.moduleAuthor.currentUser?.username) {
//             next('/');
//             return;
//         }
//     }
//     next();
//     return;
// });
export default router;
