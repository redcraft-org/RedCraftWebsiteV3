<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Firebase\JWT\JWT;

class GetToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get a JWT token';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $iss = $this->ask('What is the issuer?');
        if (!$iss) {
            $iss = config('app.url');
        }
        $payload = [
            'iss' => $iss,
            'iat' => time()
        ];
        $token = JWT::encode($payload, config('app.jwt_secret'), 'HS256');
        $this->info($token);

        return Command::SUCCESS;
    }
}
