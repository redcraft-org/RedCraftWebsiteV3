<?php

namespace Tests\Feature;

use App\Http\Middleware\TrustProxies;
use Illuminate\Http\Request;
use Tests\TestCase;

/**
 * Contact form reports named a cluster address rather than the person who
 * filled the form in, because X-Forwarded-For was being ignored outright.
 */
class TrustedProxiesTest extends TestCase
{
    private function ipSeenBehind(string $remoteAddr, string $forwardedFor): string
    {
        $request = Request::create('/', 'GET', [], [], [], [
            'REMOTE_ADDR' => $remoteAddr,
            'HTTP_X_FORWARDED_FOR' => $forwardedFor,
        ]);

        (new TrustProxies())->handle($request, fn ($request) => response(''));

        return $request->ip();
    }

    /**
     * The real shape in production: openresty on 10.0.2.254 takes the request,
     * hands it to the ingress controller, which hands it to us from a pod
     * address. Miss either hop and the walk back stops on a proxy.
     */
    public function test_the_whole_chain_is_walked_back_to_the_sender()
    {
        $this->assertSame(
            '203.0.113.7',
            $this->ipSeenBehind('10.1.158.216', '203.0.113.7, 10.0.2.254')
        );
    }

    public function test_a_single_hop_still_works()
    {
        $this->assertSame(
            '203.0.113.7',
            $this->ipSeenBehind('10.1.158.216', '203.0.113.7')
        );
    }

    /**
     * Otherwise anyone able to reach the container directly could pick the
     * address that gets written into a report.
     */
    public function test_anything_outside_the_chain_is_not_believed()
    {
        $this->assertSame(
            '192.0.2.99',
            $this->ipSeenBehind('192.0.2.99', '203.0.113.7')
        );
    }

    public function test_both_hops_are_configured()
    {
        $this->assertSame('10.1.0.0/16,10.0.2.254', config('app.trusted_proxies'));
    }
}
