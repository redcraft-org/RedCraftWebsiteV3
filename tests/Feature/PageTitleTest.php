<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

/**
 * Every page used to send the bare site name, so a tab strip was a row of
 * identical RedCraft labels and a bookmark said nothing about its target.
 */
class PageTitleTest extends TestCase
{
    private function titleOf(TestResponse $response): string
    {
        $response->assertOk();

        preg_match('/<title>(.*?)<\/title>/s', $response->getContent(), $matches);

        return trim($matches[1] ?? '');
    }

    public function test_each_page_sends_its_own_name()
    {
        Http::fake();

        $pages = [
            '/about' => 'About and FAQ',
            '/contact' => 'Contact Us',
            '/maps' => 'Maps',
            '/rules' => 'Rules',
            '/stats' => 'Stats',
            '/vote' => 'Coming Soon™',
        ];

        foreach ($pages as $uri => $name) {
            $this->assertSame(
                $name . ' | ' . config('app.name'),
                $this->titleOf($this->get($uri)),
                "Wrong title for {$uri}"
            );
        }
    }

    public function test_the_home_page_is_the_site_name_on_its_own()
    {
        Http::fake();

        $this->assertSame(
            config('app.name'),
            $this->titleOf($this->get('/'))
        );
    }

    /**
     * The cookie has to go in unencrypted. It is in the EncryptCookies except
     * list, so the middleware hands the raw value straight to LanguageSwitcher.
     */
    public function test_the_name_is_translated()
    {
        Http::fake();

        $this->assertSame(
            'Règles | ' . config('app.name'),
            $this->titleOf($this->withUnencryptedCookie('language', 'fr')->get('/rules'))
        );
    }
}
