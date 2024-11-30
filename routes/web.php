<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;

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
Route::get('/', [PublicController::class, 'homepage'])->name('welcome');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/dashboard/users', [AdminController::class, 'users'])->name('admin.dashboard.users');
Route::get('/admin/dashboard/tracks', [AdminController::class, 'track'])->name('admin.dashboard.tracks');
Route::get('/admin/dashboard/genres', [AdminController::class, 'genres'])->name('admin.dashboard.genres');
Route::post('/admin/dashboard/genres', [AdminController::class, 'store'])->name('admin.dashboard.genres.store');
Route::put('/admin/dashboard/genres/{genre}', [AdminController::class, 'update'])->name('admin.genres.update');
Route::delete('/admin/dashboard/genres/{genre}', [AdminController::class, 'destroy'])->name('admin.dashboard.genres.destroy');
Route::get('/musica/tutti-i-brani/{genre}/genere', [TrackController::class, 'filterByGenre'])->name('track.filterByGenre');

