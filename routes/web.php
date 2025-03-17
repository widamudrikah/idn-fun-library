<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Student\DashboardStudentController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::prefix('admin')->middleware('auth', AdminMiddleware::class)->group(function() {
    Route::controller(DashboardAdminController::class)->group(function() {
        Route::get('/dashboard', 'index')->name('admin.dashboard');
    });
});

// Student
Route::prefix('student')->middleware('auth')->group(function() {
    Route::controller(DashboardStudentController::class)->group(function() {
        Route::get('/dashboard', 'index')->name('student.dashboard');
    });
});