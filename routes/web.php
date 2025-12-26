<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\Admin\VideoController as AdminVideoController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\VideoRequestController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('welcome'));

/*
|--------------------------------------------------------------------------
| DASHBOARD BAWAAN (BREEZE)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    Route::get('/videos', [VideoController::class, 'index'])
        ->name('videos.index');

    Route::post('/videos/{video}/request', [VideoController::class, 'requestAccess'])
        ->name('videos.request');

    Route::get('/videos/{video}/watch', [VideoController::class, 'watch'])
        ->name('videos.watch');

});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('videos', AdminVideoController::class);
        Route::resource('customers', CustomerController::class);

        Route::get('/requests', [VideoRequestController::class, 'index'])->name('requests.index');
        Route::post('/requests/{request}/approve', [VideoRequestController::class, 'approve'])->name('requests.approve');
        Route::post('/requests/{request}/reject', [VideoRequestController::class, 'reject'])->name('requests.reject');
    });

require __DIR__.'/auth.php';
