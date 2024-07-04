import './bootstrap';
import { livewire_hot_reload } from 'virtual:livewire-hot-reload'
livewire_hot_reload();
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus'

import Swiper from "swiper";
import {Navigation , Pagination } from "swiper/modules";

window.Alpine = Alpine;
Alpine.plugin(focus)

Alpine.start();

// import Swiper and modules styles
import 'swiper/css';
// import 'swiper/css/navigation';
import 'swiper/css/pagination';
window.Swipper = Swiper;
window.Navigation = Navigation;
window.Pagination = Pagination;
