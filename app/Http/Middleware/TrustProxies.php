<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array<int, string>|string|null
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers =
        Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO |
        Request::HEADER_X_FORWARDED_AWS_ELB;

    /**
     * This was left null, so X-Forwarded-For was ignored and every request
     * appeared to come from whatever spoke to us last. Behind the ingress
     * controller that is its pod, which is why contact form reports carried a
     * 10.1.x.x cluster address instead of the sender's.
     */
    public function __construct()
    {
        $this->proxies = array_values(array_filter(array_map(
            'trim',
            explode(',', (string) config('app.trusted_proxies'))
        )));
    }
}
