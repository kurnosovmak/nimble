<template>
    <div class="block">
        <router-link :to="'/stream/'+stream.id">
            <div class="stream_block" :style="{ backgroundImage: 'url(' + stream.image + ')'}">
            </div>
            <span class="stream_title">{{ stream.title }}</span>
        </router-link>
    </div>
</template>

<script>
export default {
    name: "PreStream",
    props: {
        stream: {
            type: Object,
            required: true
        },
    }
}
</script>

<style scoped>
.block {
    width: 100%;

}

.stream_block {
    border-radius: 12px;
    width: 20%;
    margin-bottom: 12px;
    background-color: #1a202c;
    min-height: 150px;
    background-position: center;
    background-size: cover;
}
.stream_title{
    font-size: 22px;

}
</style>
