<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
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

    // CRUD Category
    Route::controller(CategoryController::class)->group(function() {
        Route::get('/category', 'index')->name('category');
        Route::post('/category/store', 'store')->name('category.store');
        Route::put('/category/update/{id}','update')->name('category.update');
        Route::delete('/category/destroy/{id}', 'destroy')->name('category.destroy');
        
    });

    // CRUD Book
    Route::controller(BookController::class)->group(function() {
        Route::get('/book', 'index')->name('book');  //untuk menampilkan semua data buku
        Route::get('/book/create', 'create')->name('book.create'); // menampilkan form tambah buku
        Route::post('/book/store', 'store')->name('book.store'); // menyimpan buku ke database
        Route::get('/book/{id}', 'detail')->name('book.detail'); // detail data
        Route::get('/book/edit/{id}', 'edit')->name('book.edit'); // edit data
    });
});

// Student
Route::prefix('student')->middleware('auth')->group(function() {
    Route::controller(DashboardStudentController::class)->group(function() {
        Route::get('/dashboard', 'index')->name('student.dashboard');
    });
});