<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        // None of these tests assert on assets, and building the front end just
        // to render a page would add a minute to every run. Under Mix this went
        // unnoticed because mix-manifest.json was committed; Vite's manifest is
        // a build artefact, so the tests have to say they do not need it.
        $this->withoutVite();
    }
}
