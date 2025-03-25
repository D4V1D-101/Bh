<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Redirect;

class RedirectToHome extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-arrow-left';

    protected static string $view = 'filament.pages.redirect-to-home';

    protected static ?string $slug = 'home-redirect';

    protected static ?int $navigationSort = 999;

    protected static ?string $navigationLabel = 'Back to Home';

    public function mount()
    {
        return Redirect::route('home'); // Vagy bármilyen más útvonal
    }
}
