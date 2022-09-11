import { createWebHistory, createRouter } from "vue-router";
import ErrorPage from "@/pages/ErrorPage.vue";
import HomePage from "@/pages/HomePage.vue";
import StreamPage from "@/pages/StreamPage.vue";
import LoginPage from "@//pages/LoginPage.vue";
import RegisterPage from "@//pages/RegisterPage.vue";
import CreateStream from "@/pages/CreateStream.vue";

const routes = [
    {
        path: '/',
        name:'Home',
        component: HomePage
    },
    {
        path: '/stream/:id',
        name:'Stream',
        component: StreamPage
    },

    {
        path: '/login',
        name:'Login',
        component: LoginPage
    },

    {
        path: '/register',
        name:'Register',
        component: RegisterPage
    },


    {
        path: '/stream/create',
        name:'Stream create',
        component: CreateStream
    },
    {
        path: '/:pathMatch(.*)*',
        component: ErrorPage
    },
];

const router = new createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
