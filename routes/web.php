<?php

use App\Http\Controllers\Admin\FishController as AdminFishController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
// admin controllers

use App\Http\Controllers\User\FishController as UserFishController;
// user controllers

use App\Http\Controllers\Guest\FishController as GuestFishController;

// guest controllers
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// admin routes

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('fish', AdminFishController::class);
    Route::resource('user', AdminUserController::class);
});

// user routes
Route::prefix('user')->name('user.')->middleware(['auth', 'role:user'])->group(function () {
    Route::resource('fish', UserFishController::class)->only(['index', 'show']);
});

// guest routes
Route::name('guest.')->group(function () {
    Route::resource('fish', GuestFishController::class)->only(['index', 'show']);
});
