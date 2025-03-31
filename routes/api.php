<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/games', [App\Http\Controllers\Api\GameController::class, 'index']);
Route::get('/games/{id}', [App\Http\Controllers\Api\GameController::class, 'show']);
