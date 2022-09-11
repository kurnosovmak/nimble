<template>
    <div>
        <input type="text" v-model="loginsCr.name" placeholder="name">
        <input type="text" v-model="loginsCr.login" placeholder="login">
        <input type="password" v-model="loginsCr.password" placeholder="password">
        <button @click="register">Register</button>
    </div>
</template>

<script>
import useAuth from "../hooks/useAuth";
import {ref} from "vue";
import axios from "axios";

export default {
    name: "RegisterPage",
    setup() {
        const {setAuth} = useAuth();


        const loginsCr = ref({
            login: '',
            name: '',
            password: '',
        });

        const register = async () => {
            try {
                const res = await axios.post('/api/register', {
                    name: loginsCr.value.name,
                    email: loginsCr.value.login,
                    password: loginsCr.value.password,
                    token_name: 'WEB',
                });
                setAuth(res.data.data.token);
                window.location = '/';

            } catch (e) {
                loginsCr.value = {
                    login: '',
                    name: '',
                    password: '',
                };
                alert(e.message);
            }
        }

        return {setAuth, loginsCr, register};
    }
}
</script>

<style scoped>

</style>
