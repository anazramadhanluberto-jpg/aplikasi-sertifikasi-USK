<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\UserDashboardController;

// Halaman Utama / Welcome
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Group Route khusus Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('peserta', PesertaController::class)->parameters([
        'peserta' => 'peserta'
    ]);
    Route::resource('skema', SkemaController::class);
});

// Group Route khusus User / Peserta (Harus Login & Role User)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/users/dashboard', [UserDashboardController::class, 'index'])->name('users.dashboard');
    Route::get('/users/complete-profile', [UserDashboardController::class, 'createProfile'])->name('user.complete-profile');
    Route::post('/users/complete-profile', [UserDashboardController::class, 'storeProfile'])->name('user.store-profile');

    Route::get('/users/edit-profile', [UserDashboardController::class, 'editProfile'])->name('user.edit-profile');
    Route::put('users/edit-profile', [UserDashboardController::class, 'updateProfile'])->name('user.update-profile');
});

Route::get('/skema/{id}', [SkemaController::class, 'show'])->name('skema.show');
