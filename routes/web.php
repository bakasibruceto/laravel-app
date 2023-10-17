<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// First time
Route::get('/', function () {
    return view('auth.login');
})->name('login');

// Authenticated users
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/home', function () {
            return view('dashboard');
        })->name('dashboard');
    
       
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
   
    Route::get('/myprofile', function () {
        return view('profile.show');
    })->name('myprofile');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Logged in
Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('home');

// Handle undefined routes (for all users)
Route::fallback(function () {  
    if (auth()->check()) {
        return redirect()->route('home');
    }
    // For non-authenticated users, redirect to the login page
    return redirect()->route('login');
});

require __DIR__ . '/auth.php';