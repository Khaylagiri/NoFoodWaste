<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\DonationClaimController; 
use App\Http\Controllers\HistoryController; 

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
|
*/

// Include additional routes if needed (for admin, etc.)
include_once(base_path('routes/admin_web.php'));

// Route untuk homepage (accessible to all)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route untuk pengunjung yang belum login (guest)
Route::middleware('guest')->group(function () {
    // Halaman login
    Route::get('login', function() {
        return view('login');
    })->name('login');

    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    
    // Halaman registrasi
    Route::get('register', function() {
        return view('register');
    })->name('register');
    
    Route::post('register', [AuthController::class, 'register'])->name('register.post');
    
    // Password reset routes
    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

// Route untuk pengguna yang sudah login (authenticated)
Route::middleware('auth')->group(function () {
    // Route untuk logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Rute dashboard berdasarkan role (Donatur atau Penerima)
    Route::get('/dashboard', function() {
        $user = auth()->user();
        if ($user->role == 'donatur') {
            return redirect()->route('dashboard.donator');  // Redirect ke dashboard Donatur
        } else {
            return redirect()->route('dashboard.penerima');  // Redirect ke dashboard Penerima
        }
    })->name('dashboard');

    // Route untuk dashboard Donatur
    Route::get('/dashboard/donator', function() {
        return view('donatur.index');  // Menampilkan dashboard Donatur
    })->name('dashboard.donator');

    // Route untuk dashboard Penerima
    Route::get('/dashboard/penerima', [DonationClaimController::class, 'penerimaIndex'])->name('dashboard.penerima');

    // Rute untuk Donasi
    Route::get('/donate', [DonationController::class, 'index'])->name('donate');
    Route::get('/find-donations', [DonationController::class, 'findDonations'])->name('find-donations');

    // Route untuk klaim donasi (Penerima)
    Route::prefix('donation-claims')->group(function () {
        Route::get('/', [DonationClaimController::class, 'index'])->name('donation.claims'); // Melihat klaim donasi
        Route::post('/{donation_id}', [DonationClaimController::class, 'store'])->name('donation.claim.store'); // Klaim donasi
        Route::post('/approve/{claim_id}', [DonationClaimController::class, 'approve'])->name('donation.claim.approve'); // Approve klaim
        Route::post('/reject/{claim_id}', [DonationClaimController::class, 'reject'])->name('donation.claim.reject'); // Reject klaim
      Route::get('/riwayat-makanan', [HistoryController::class, 'showHistory'])->name('penerima.riwayat');
    });
});

// Admin Starter Kit
Route::prefix('starter-kit')->group(function () {
    Route::view('index', 'admin.color-version.index')->name('index');
});
