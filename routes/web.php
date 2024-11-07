<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HQStoreController;
use App\Http\Controllers\FactoryStoreController;
use App\Http\Controllers\TrimsController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AdminUserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\LoginController;


// Authentication routes
Auth::routes();

// Home route (redirect after login)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/users', AdminUserController::class);
});

    


// HQ Store routes
Route::middleware(['auth', 'role:HQ_store'])->group(function () {
    Route::get('/hq-store/dashboard', [HQStoreController::class, 'index'])->name('hq.store.dashboard');
});

// Factory Store routes
Route::middleware(['auth', 'role:factory_store'])->group(function () {
    Route::get('/factory-store/dashboard', [FactoryStoreController::class, 'index'])->name('factory.store.dashboard');
});

// Trims routes
Route::middleware(['auth', 'role:trims'])->group(function () {
    Route::get('/trims/dashboard', [TrimsController::class, 'index'])->name('trims.dashboard');
});

// Accounts routes
Route::middleware(['auth', 'role:accounts'])->group(function () {
    Route::get('/accounts/dashboard', [AccountsController::class, 'index'])->name('accounts.dashboard');
});

// Optional: Redirect root to home
Route::get('/', function () {
    return redirect('/home');
});



