<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\TwoFactorAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::view('/','login')->name('login');
Route::view('/registro', 'registro')->name('registro');
Route::view('/dashboard','dashboard')->name('dashboard')->middleware('2fa');

Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/registro', [RegistroController::class, 'registro']);

Route::get('/download', [UserController::class, 'descargar']);


Route::get('two-factor-auth', [TwoFactorAuthController::class, 'index'])->name('2fa.index')->middleware('auth');
Route::post('two-factor-auth', [TwoFactorAuthController::class, 'store'])->name('2fa.store');
Route::get('two-factor-auth/resent', [TwoFactorAuthController::class, 'reenviar'])->name('2fa.resend');
