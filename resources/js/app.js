require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.magic('clipboard', () => {
    return subject => navigator.clipboard.writeText(subject)
})

Alpine.start();
