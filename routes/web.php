<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('frontend');
Route::get('password/reset/verify/{token}/{email}', [ForgotPasswordController::class, 'forgetVerifyForm'])->name('password.reset.verify_form');
Route::get('password/reset/verify/{token}', [ForgotPasswordController::class, 'forgetVerify'])->name('password.reset.verify');
Route::post('password/reset/verify-resend/{token}', [ForgotPasswordController::class, 'forgetVerifyResend'])->name('password.reset.verify_resend');
Route::post('password/reset/update/{token}', [ForgotPasswordController::class, 'updatePassword'])->name('password.update');
