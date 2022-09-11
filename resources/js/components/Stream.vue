<template>
    <div class="stream">
        <div v-if="isLive">
            <video id='hls-example' class="video-js vjs-default-skin" controls preload="auto"
                   data-setup='{}'>
                <source type="application/x-mpegURL"
                        :src="'http://89.22.229.228:5080/TestApp/streams/'+ stream.stream.streamId + '.m3u8'"/>
            </video>
        </div>
        <div v-else class="placeholder" :style="{ backgroundImage: 'url(' + stream.image + ')'}">

        </div>
        <span
            style="font-size: 16px;background-color: #2d3748;color: #fff;border-radius: 20px;padding: 6px 12px;margin-top: 50px">{{
                stream.user.name
            }}</span>
        <span style="font-size: 36px;display: block;margin: 20px 0;">{{ stream.title }}</span>
        <span style="font-size: 24px;">{{ stream.description }}</span>
    </div>
</template>

<script>

export default {
    name: "Stream",
    components: {},
    props: {
        stream: {
            type: Object,
            required: true
        }
    },
    computed: {
        isLive() {
            return this.stream.stream.status === 'broadcasting';
        },
    },
    mounted() {
        if(this.isLive) {
            const player = videojs('hls-example');
            player.play();
        }
    },
    methods: {},
    data() {
        return {};
    },
}
</script>

<style scoped>
.stream {
    padding: 12px 15%;
    height: 100%;
}

.placeholder {
    background-position: center;
    background-size: cover;
    width: 100%;
    height: 60%;
    border-radius: 12px;
    box-shadow: 1px 1px #000000;
    margin-bottom: 16px;
}

#hls-example {
    width: 100%;
    height: 50vh;
    margin-bottom: 30px;
    border-radius: 12px;
    box-shadow: 1px 1px #000000;
}

</style>
