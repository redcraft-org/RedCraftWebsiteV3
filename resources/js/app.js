import intersect from '@alpinejs/intersect';
import './alpineFunctions.js';

// No Alpine import and no Alpine.start() here on purpose. Livewire 3 ships its
// own Alpine and starts it, and @livewireScripts is on every layout, so
// creating a second instance gives "Detected multiple instances of Alpine
// running" and breaks @entangle, which is what left the contact form blank.
//
// alpine:init fires before Livewire starts Alpine, which is the window in which
// plugins have to be registered.
document.addEventListener('alpine:init', () => {
    window.Alpine.plugin(intersect);
});
