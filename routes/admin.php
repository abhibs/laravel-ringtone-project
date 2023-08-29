<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\RingtoneController;




Route::get('/test', function () {
    echo "Abhiram";
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin-login');
    Route::post('/login', [AdminController::class, 'loginPost'])->name('admin-login-post');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
        Route::get('/logout', [Admincontroller::class, 'adminLogout'])->name('admin-logout');
        Route::get('/profile', [Admincontroller::class, 'adminProfile'])->name('admin-profile');
        Route::post('/profile/update', [AdminController::class, 'adminProfileUpdate'])->name('admin-profile-update');
        Route::post('/update/password', [AdminController::class, 'updatePassword'])->name('admin-password-update');

        Route::get('/category/create', [CategoryController::class, 'create'])->name('category-create');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('category-store');
        Route::get('/category', [CategoryController::class, 'index'])->name('category');
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
        Route::post('/category/update', [CategoryController::class, 'update'])->name('category-update');
        Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category-delete');

        Route::get('/ringtone/create', [RingtoneController::class, 'create'])->name('ringtone-create');
        Route::post('/ringtone/store', [RingtoneController::class, 'store'])->name('ringtone-store');
        Route::get('/ringtone', [RingtoneController::class, 'index'])->name('ringtone');
        Route::get('/ringtone/edit/{id}', [RingtoneController::class, 'edit'])->name('ringtone-edit');
        Route::post('/ringtone/update/{id}', [RingtoneController::class, 'update'])->name('ringtone-update');
        Route::get('/ringtone/delete/{id}', [RingtoneController::class, 'delete'])->name('ringtone-delete');
        Route::get('/ringtone/inactive/{id}', [RingtoneController::class, 'inactive'])->name('ringtone-inactive');
        Route::get('/ringtone/active/{id}', [RingtoneController::class, 'active'])->name('ringtone-active');

    });
});
