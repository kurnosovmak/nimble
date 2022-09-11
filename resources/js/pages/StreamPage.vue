<template>
        <stream v-if="stream !== null" :stream="stream"/>

</template>

<script>
import {useRoute} from "vue-router";
import Stream from "@/components/Stream.vue";
import {onMounted, ref} from "vue";
import axios from "axios";
import Header from "@/components/Header.vue";

export default {
    name: "StreamPage",
    components: {Header, Stream},
    setup() {

        const route = useRoute()

        const stream = ref(null);

        onMounted(async function () {
            const res = await axios.get('http://127.0.0.1:8000/api/streams/' + route.params.id);
            stream.value = res.data.data
        });

        return {stream};
    }
}
</script>

<style scoped>

</style>
