<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackController;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::prefix('profilo')->group(function () {
    Route::get('/', [ProfileController::class, 'page'])->name('profile.page');
    Route::put('/{user}/aggiorna-avatar', [ProfileController::class, 'setAvatar'])->name('profile.setAvatar');
    Route::get('/{user}/aggiorna-dati', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/{user}/aggiorna-dati', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/musica/crea', [TrackController::class, 'create'])->name('track.create');
Route::post('/musica/crea', [TrackController::class, 'store'])->name('track.store');


