/**
 * @vitest-environment jsdom
 */
import { beforeEach, expect, test, vi } from 'vitest';

beforeEach(() => {
    vi.resetModules();
    delete window.Alpine;
    document.body.innerHTML = '';
});

// Livewire 3 ships and starts its own Alpine. This entry point must register
// against that one and must not create a second, or Alpine reports "Detected
// multiple instances" and @entangle stops working, which is what left the
// contact form rendering as an empty box.
test('the entry point imports without throwing', async () => {
    await expect(import('../app.js')).resolves.toBeDefined();
});

test('it does not start an Alpine of its own', async () => {
    await import('../app.js');
    expect(window.Alpine, 'app.js must not create a second Alpine').toBeUndefined();
});

test('on alpine:init it registers the plugin and the clipboard magic', async () => {
    const plugin = vi.fn();
    const magic = vi.fn();
    await import('../app.js');

    window.Alpine = { plugin, magic };
    document.dispatchEvent(new Event('alpine:init'));

    // Not an exact count: each import in this file leaves its alpine:init
    // listener on the shared jsdom document, so earlier tests add to the tally.
    expect(plugin, 'intersect plugin not registered').toHaveBeenCalled();
    expect(magic).toHaveBeenCalledWith('clipboard', expect.any(Function));
});

test('the clipboard magic writes to the clipboard', async () => {
    const writeText = vi.fn();
    Object.defineProperty(window.navigator, 'clipboard', { value: { writeText }, configurable: true });
    const magic = vi.fn();
    await import('../app.js');

    window.Alpine = { plugin: vi.fn(), magic };
    document.dispatchEvent(new Event('alpine:init'));

    const factory = magic.mock.calls.find(([name]) => name === 'clipboard')[1];
    factory()('hello');
    expect(writeText).toHaveBeenCalledWith('hello');
});
