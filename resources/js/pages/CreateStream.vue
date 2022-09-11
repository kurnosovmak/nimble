<template>
    <div>
        <input type="text" v-model="models.title" placeholder="title">
        <input type="text" v-model="models.description" placeholder="description">
        <input type="file" @change="previewFiles" placeholder="image">
        <button @click="create">Create</button>
    </div>
</template>

<script>
import {onMounted, ref} from "vue";
import useAuth from "../hooks/useAuth";

export default {
    name: "CreateStream",
    setup() {
        const {isAuth,key} = useAuth();
        const image = ref(null);
        const models = ref({
            title: '',
            description: '',
        })
        const previewFiles = (event)=> {
            image.value = event.target.files[0];
        }

        onMounted(()=>{
            if(!isAuth){
                window.location = '/';
            }
        })

        const create = async ()=>{
            let fd= new FormData()
            fd.append('title',models.value.title);
            fd.append('description',models.value.description);
            fd.append('image',image.value);
            try {
                const res = await axios.post('/api/streams', fd,{
                    headers:{
                        'Authorization': 'Bearer ' + key.value,
                        'Content-Type': 'multipart/form-data'
                    }
                })
                console.log(res.data.data)
                window.location = '/stream/'+res.data.data.id
            }catch (e){

            }
        }

        return {models, create, image, previewFiles};
    }
}
</script>

<style scoped>

</style>
