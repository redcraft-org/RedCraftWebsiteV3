/**
 * @vitest-environment jsdom
 */
import { beforeEach, expect, test, vi } from 'vitest';

beforeEach(() => {
    // Alpine starts once per module instance, so the entry point has to be
    // re-evaluated for each test rather than served from the module cache.
    vi.resetModules();
    delete window.Alpine;
    document.body.innerHTML = '';
});

// The bug this guards against: app.js assigned window.Alpine and then imported
// alpineFunctions.js, which reached for that global. ES imports are hoisted, so
// the import ran first, threw on an undefined Alpine, and stopped the whole
// bundle. Nothing surfaced as an error, Alpine just never started.
test('importing the entry point does not throw, and Alpine ends up on window', async () => {
    await expect(import('../app.js')).resolves.toBeDefined();
    expect(window.Alpine).toBeDefined();
});

test('alpineFunctions registers its magic without relying on a global', async () => {
    await import('../app.js');
    expect(typeof window.Alpine.magic).toBe('function');
    expect(window.Alpine.version).toBeTruthy();
});

// The regression was invisible in markup terms: Alpine never processed the DOM,
// so everything meant to start hidden rendered at once. This asserts Alpine is
// actually driving the document rather than merely being present on window.
test('Alpine processes x-show, so hidden panels stay hidden', async () => {
    document.body.innerHTML = `
        <div x-data="{ open: false }">
            <p id="panel" x-show="open">details</p>
        </div>`;
    await import('../app.js');
    await new Promise((r) => setTimeout(r, 50));
    expect(document.getElementById('panel').style.display).toBe('none');
});
