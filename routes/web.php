<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\PublicController;

Route::prefix('profilo')->group(function () {
    Route::get('/', [ProfileController::class, 'page'])->name('profile.page');
    Route::put('/{user}/aggiorna-avatar', [ProfileController::class, 'setAvatar'])->name('profile.setAvatar');
    Route::get('/{user}/aggiorna-dati', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/{user}/aggiorna-dati', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/musica/crea', [TrackController::class, 'create'])->name('track.create');
Route::post('/musica/crea', [TrackController::class, 'store'])->name('track.store');
Route::get('/musica/tutti-i-brani', [TrackController::class, 'index'])->name('track.index');
Route::get('/musica/tutti-i-brani/{user}/autore', [TrackController::class, 'filterByUser'])->name('track.filterByUser');
Route::get('/', [PublicController::class, 'welcome'])->name('welcome');
