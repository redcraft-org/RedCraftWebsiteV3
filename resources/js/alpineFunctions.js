// Registered against Livewire's Alpine on alpine:init rather than against an
// imported instance, since this app no longer creates one of its own.
document.addEventListener('alpine:init', () => {
    window.Alpine.magic('clipboard', () => {
        return subject => navigator.clipboard.writeText(subject)
    })
})
