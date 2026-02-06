<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('movies.index');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return redirect()->route('movies.index');
    })->name('dashboard');

    Route::get('/movies', [MovieController::class, 'index'])
        ->name('movies.index');

    Route::post('/favorite', [FavoriteController::class, 'store'])
        ->name('favorite.store');

    Route::get('/favorites', [FavoriteController::class, 'index'])
        ->name('favorites.index');

    Route::delete('/favorite/{favorite}', [FavoriteController::class, 'destroy'])
        ->name('favorite.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
