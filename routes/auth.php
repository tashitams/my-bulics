<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;


Route::middleware(['guest'])->group(function () {
    // staff
    Route::inertia('/', 'Auth/Login')
        ->name('staff.login');

    Route::post('/', [LoginController::class, 'authenticate'])
        ->name('staff.login.post');

    Route::inertia('/forgot-password', 'Auth/ForgotPassword')
        ->name('staff.forgot.password');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'forgetPassword'])
        ->name('forgot.password.post');

    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])
        ->name('password.reset');

    Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword'])
        ->name('password.reset.post');

    // admin
    Route::inertia('/admin/login', 'Auth/AdminLogin')
        ->name('admin.login');

    Route::post('/admin/login', [AdminLoginController::class, 'authenticate'])
        ->name('admin.login.post');
});

Route::delete('/staff/logout', [LoginController::class, 'logout'])
    ->name('staff.logout')
    ->middleware('auth');

Route::delete('/admin/logout', [AdminLoginController::class, 'adminLogout'])
    ->name('admin.logout')
    ->middleware('auth:admin');


