<?php

namespace App\Providers;

use App\Models\Token;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class FilamentLogoutServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Event::listen(Logout::class, function ($event) {
            $user = $event->user;

            if ($user) {
                Token::where('user_id', $user->id)->delete();
            }
        });
    }
}
