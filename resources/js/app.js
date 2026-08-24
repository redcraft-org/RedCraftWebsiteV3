import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import './alpineFunctions.js';

window.Alpine = Alpine;
Alpine.plugin(intersect);
Alpine.start();
