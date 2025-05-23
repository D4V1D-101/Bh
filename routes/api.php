<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\GenresController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\PageController;

Route::prefix('games')->group(function () {
    Route::get('/', [GameController::class, 'index']);
    Route::get('/{id}', [GameController::class, 'show']);
    Route::post('/', [GameController::class, 'store']);
    Route::put('/{id}', [GameController::class, 'update']);
});

Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index']);
    Route::get('/{id}', [ArticleController::class, 'show']);
    Route::post('/', [ArticleController::class, 'store']);
    Route::put('/{id}', [ArticleController::class, 'update']);
    Route::delete('/{id}', [ArticleController::class, 'destroy']);
});

Route::prefix('faqs')->group(function () {
    Route::get('/', [FaqController::class, 'index']);
    Route::get('/{id}', [FaqController::class, 'show']);
    Route::post('/', [FaqController::class, 'store']);
    Route::put('/{id}', [FaqController::class, 'update']);
    Route::delete('/{id}', [FaqController::class, 'destroy']);
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);

});

Route::prefix('genres')->group(function () {
    Route::get('/', [GenresController::class, 'index']);
    Route::get('/{id}', [GenresController::class, 'show']);

});

Route::prefix('members')->group(function () {
    Route::get('/', [MemberController::class, 'index']);
    Route::get('/{id}', [MemberController::class, 'show']);
    Route::post('/', [MemberController::class, 'store']);
    Route::put('/{id}', [MemberController::class, 'update']);
    Route::delete('/{id}', [MemberController::class, 'destroy']);
});

Route::prefix('pages')->group(function () {
    Route::get('/', [PageController::class, 'index']);
    Route::get('/{id}', [PageController::class, 'show']);
    Route::post('/', [PageController::class, 'store']);
    Route::put('/{id}', [PageController::class, 'update']);
    Route::delete('/{id}', [PageController::class, 'destroy']);
});
