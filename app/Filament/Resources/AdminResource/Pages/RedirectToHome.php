<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Redirect;

class RedirectToHome extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.redirect-to-home';

    protected static ?string $slug = 'home-redirect';

    protected static ?string $navigationLabel = 'Redirect Home';

    public function mount()
    {
        return Redirect::route('home'); // Vagy bármilyen más útvonal
    }
}
