document.addEventListener('alpine:init', () => {

    window.Alpine.magic('clipboard', () => subject => {
        navigator.clipboard.writeText(subject).then(function() { show = true; setTimeout(() => show = false, 3000) });
    });

});
