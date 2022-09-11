<template>
    <div>
        <Header/>
        <div class="home">
            <pre-stream v-for="stream in streams" :key="stream.id" :stream="stream"/>

        </div>
    </div>
</template>

<script>
import {ref, onMounted} from 'vue';
import PreStream from "@/components/PreStream.vue";
import axios from "axios";
import Header from "@/components/Header.vue";
export default {
    name: "HomePage",
    components: {Header, PreStream},
    setup(){

        const streams = ref([]);

        onMounted(async function (){

            const res = await axios.get('/api/streams');
            streams.value = res.data.data
        });

        return {streams};
    }
}
</script>

<style scoped>
.home{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    gap: calc(20% / 3);
    padding: 20px 36px;
}
</style>
