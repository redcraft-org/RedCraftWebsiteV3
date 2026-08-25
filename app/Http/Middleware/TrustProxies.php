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
     * X-Forwarded-Port is deliberately absent, and AWS_ELB with it, since that
     * constant bundles the port bit. The proxy terminates tls and speaks to the
     * cluster over port 80, so the forwarded port is 80 while the forwarded
     * scheme is https. Honouring both builds every asset url as
     * https://redcraft.org:80, which nothing serves. The scheme on its own
     * already implies the right port.
     *
     * @var int
     */
    protected $headers =
        Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PROTO;

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
