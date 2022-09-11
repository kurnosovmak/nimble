import {computed} from 'vue';

export default function useAuth() {
    const key = computed(function () {
        return localStorage.getItem('token')
    });

    const isAuth =  computed(() =>{
        return key.value != null;
    });

    const setAuth = (key) => {
        localStorage.setItem('token', key)
    }

    const clearAuth = () => {
        localStorage.clear()
    }


    return {isAuth, key, setAuth, clearAuth};
}
