<?php
use App\Http\Controllers\YourController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckTrackOwner;

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
Route::get('/musica/tutti-i-brani/{genre}/genere', [TrackController::class, 'filterByGenre'])->name('track.filterByGenre');
Route::get('/musica/aggiorna/{track}/brano', [TrackController::class, 'edit'])->name('track.edit');
Route::put('/musica/aggiorna/{track}/brano', [TrackController::class, 'update'])->name('track.update');

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth');
});

Route::middleware(['auth'])->group(function () {
    Route::delete('/musica/elimina/{track}/brano', [TrackController::class, 'destroy'])
        ->middleware(CheckTrackOwner::class)
        ->name('track.destroy');
});

Route::get('/', [PublicController::class, 'homepage'])->name('welcome');

Route::prefix('admin/dashboard')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.dashboard.users');
    Route::get('/tracks', [AdminController::class, 'track'])->name('admin.dashboard.tracks');
    Route::get('/genres', [AdminController::class, 'genres'])->name('admin.dashboard.genres');
    Route::post('/genres', [AdminController::class, 'store'])->name('admin.dashboard.genres.store');
    Route::put('/genres/{genre}', [AdminController::class, 'update'])->name('admin.genres.update');
    Route::delete('/genres/{genre}', [AdminController::class, 'destroy'])->name('admin.dashboard.genres.destroy');
    Route::get('/musica/download/{track}/brano', [TrackController::class, 'download'])->name('track.download');
});
    


