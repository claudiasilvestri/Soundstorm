<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController; // Importazione esplicita del controller

Route::get('/', function () {
    return view('welcome');
})->name('home'); // Nome aggiunto per coerenza

// Rotte relative al profilo utente
Route::prefix('profilo')->group(function () {
    Route::get('/', [ProfileController::class, 'page'])->name('profile.page');
    Route::put('/{user}/aggiorna-avatar', [ProfileController::class, 'setAvatar'])->name('profile.setAvatar');
});

Route::put('/profilo/{user}/aggiorna-avatar', [ProfileController::class, 'setAvatar'])->name('profile.setAvatar');
Route::get('/profilo/{user}/aggiorna-dati', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profilo/{user}/aggiorna-dati', [ProfileController::class, 'update'])->name('profile.update');

