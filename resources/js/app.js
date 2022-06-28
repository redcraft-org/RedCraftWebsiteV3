require('./bootstrap');

import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect'

window.Alpine = Alpine;

require('./alpineFunctions.js');

Alpine.plugin(intersect)

Alpine.start();
