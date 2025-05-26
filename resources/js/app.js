import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Alpine from 'alpinejs'
import intersect from '@alpinejs/intersect'
import focus from '@alpinejs/focus'
import Chart from 'chart.js/auto'

window.Alpine = Alpine
Alpine.plugin(intersect)
Alpine.plugin(focus)
Alpine.start()