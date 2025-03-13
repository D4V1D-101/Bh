<?php

namespace App\Providers;

use App\Auth\Argon2idHasher;
use Illuminate\Hashing\HashManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->extend('hash', function ($service, $app) {
            $service->extend('custom-argon2id', function () {
                return new Argon2idHasher([
                    'memory' => 65536,
                    'time' => 4,
                    'threads' => 8,
                ]);
            });
            return $service;
        });
    }

    // ...
}
