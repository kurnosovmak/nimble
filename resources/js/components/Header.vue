<template>
    <div class="header">
        <div v-if="isAuth">
            <span>You link to streaming  - rtmp://89.22.229.228/TestApp/{{ user?.key }}</span>
            <button @click="()=>{clearAuth();}">logout</button>
        </div>
        <div v-else >
            <router-link style="color: white;margin-right: 12px" to="/login">Login</router-link>
            <router-link style="color: white" to="/register">Register</router-link>
        </div>
    </div>
</template>

<script>
import useAuth from "../hooks/useAuth.js";
import {onMounted, ref} from "vue";
import axios from "axios";

export default {
    name: "Header",
    setup() {
        const {key, isAuth, clearAuth} = useAuth()

        const user = ref(null);

        onMounted(async () => {
            if (isAuth) {
                const rez = await axios.get('http://127.0.0.1:8000/api/user', {
                    headers: {
                        'Authorization': 'Bearer ' + key.value
                    }
                })
                user.value = rez.data.data
            }
        })

        return {key, isAuth, user, clearAuth};
    }
}
</script>

<style scoped>
.header {
    background-color: #1653a5;
    width: 100%;
    height: 56px;
    color: white;
}
</style>
