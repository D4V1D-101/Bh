<?php

use App\Livewire\ShowBlog;
require __DIR__.'/auth.php';
use App\Livewire\ShowHome;
use App\Livewire\ShowPage;
use App\Livewire\BlogDetail;
use App\Livewire\ShowFaqPage;
use App\Livewire\ShowService;
use App\Livewire\ShowTeamPage;
use Filament\Facades\Filament;
use App\Livewire\ShowServicePage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DownloadController;

Route::get('/', ShowHome::class)->name('home');
Route::get('/games', ShowServicePage::class)->name('servicesPage');
Route::get('/game/{id}', ShowService::class)->name('servicePage');
Route::get('/team', ShowTeamPage::class)->name('teamPage');
Route::get('/faqs', ShowFaqPage::class)->name('faqs');
Route::get('/page/{id}', ShowPage::class)->name('page');
Route::get('/blog', ShowBlog::class)->name('blog');
Route::get('/blog/{id}', BlogDetail::class)->name('blogDetail');Route::match(['get', 'post'], '/user-logout', function () {
    $user = Auth::user();
    if ($user) {
        \App\Models\Token::where('user_id', $user->id)->delete();
    }
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/');
})->name('user.logout');
Route::get('/download', [DownloadController::class, 'download'])->name('download.route');
