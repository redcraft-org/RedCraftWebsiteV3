/**
 * @vitest-environment jsdom
 */
import { existsSync, readdirSync, readFileSync } from 'node:fs';
import { expect, test } from 'vitest';

const DIR = 'public/build/assets';
const find = (re) => (existsSync(DIR) ? readdirSync(DIR).find((f) => re.test(f)) : undefined);

// Page stylesheets used to be linked above the layout, so a utility class in
// the main bundle beat anything a page file declared. They are pushed into the
// head after it now, which reverses that. Anything a page file declares that
// Alpine also toggles will therefore win and the toggle silently stops working.
// That is how all three code of conduct panels ended up visible at once.
test('a panel carrying opacity-0 actually computes to transparent', () => {
    const app = find(/^app-.*\.css$/);
    const rules = find(/^rules-.*\.css$/);
    expect(app, 'run npm run build before the tests').toBeDefined();
    expect(rules).toBeDefined();

    document.head.innerHTML =
        `<style>${readFileSync(`${DIR}/${app}`, 'utf8')}</style>` +
        `<style>${readFileSync(`${DIR}/${rules}`, 'utf8')}</style>`;
    document.body.innerHTML =
        `<div class="code-conduct-details" id="shown">a</div>
         <div class="code-conduct-details opacity-0" id="hidden">b</div>`;

    expect(getComputedStyle(document.getElementById('shown')).opacity).toBe('1');
    expect(getComputedStyle(document.getElementById('hidden')).opacity).toBe('0');
});
