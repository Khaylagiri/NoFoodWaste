<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

@include_once('admin_web.php');

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('/');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/donate', [DonationController::class, 'index'])->name('donate');
Route::get('/find-donations', [DonationController::class, 'findDonations'])->name('find-donations');

Route::prefix('starter-kit')->group(function () {
    Route::view('index', 'admin.color-version.index')->name('index');
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);