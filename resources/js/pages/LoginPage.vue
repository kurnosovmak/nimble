<template>
    <div>
        <input type="text" v-model="loginsCr.login" placeholder="login">
        <input type="password" v-model="loginsCr.password" placeholder="password">
        <button @click="login">Login</button>
    </div>
</template>

<script>
import useAuth from "../hooks/useAuth.js";
import {ref} from "vue";
import axios from "axios";

export default {
    name: "LoginPage",
    setup() {
        const {setAuth} = useAuth();


        const loginsCr = ref({
            login: '',
            password: '',
        });

        const login = async () => {
            try {
                const res = await axios.post('http://127.0.0.1:8000/api/login', {
                    email: loginsCr.value.login,
                    password: loginsCr.value.password,
                    token_name: 'WEB',
                })
                setAuth( res.data.data.token);
                window.location = 'http://127.0.0.1:8000/';

            }catch (e){
                loginsCr.value = {login: '',
                    password: '',};
                alert('error login or password');
            }


        }

        return {setAuth, loginsCr, login};
    }
}
</script>

<style scoped>

</style>
