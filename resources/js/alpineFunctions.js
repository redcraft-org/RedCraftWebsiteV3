import Alpine from 'alpinejs';

// Imports its own reference rather than reaching for a global. Under Mix this
// file was pulled in with require(), which runs inline, so window.Alpine was
// already set by the time it ran. ES imports are hoisted and evaluated before
// the importing module's body, so relying on the global here left Alpine
// undefined and took the whole bundle down with it.
Alpine.magic('clipboard', () => {
    return subject => navigator.clipboard.writeText(subject)
})
