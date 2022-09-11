import './bootstrap';

import {createApp} from 'vue'
import App from './App.vue'
import router from "./router";
import VideoPlayer from 'vue-video-player';



createApp(App).use(router).use(VideoPlayer).mount("#app")
