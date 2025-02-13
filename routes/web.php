<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminFishController;
use App\Http\Controllers\Admin\AdminFishFamilyController;
use App\Http\Controllers\Admin\AdminUserController;
// admin controllers

use App\Http\Controllers\User\UserFishController;
// user controllers

use App\Http\Controllers\Guest\GuestFishController;

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
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('fish', AdminFishController::class);
    Route::resource('user', AdminUserController::class);
    Route::resource('fish-family', AdminFishFamilyController::class);
});

// user routes
Route::prefix('user')->name('user.')->middleware(['auth', 'role:user'])->group(function () {
    Route::resource('fish', UserFishController::class)->only(['index', 'show']);
});

// guest routes
Route::name('guest.')->group(function () {
    Route::resource('fish', GuestFishController::class)->only(['index', 'show']);
});
