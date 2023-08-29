<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('', [HomeController::class, 'index'])->name('c');
Route::get('ringtone/category/{id}', [HomeController::class, 'category'])->name('ringtone-category');
Route::get('ringtone/details/{id}/{slug}', [HomeController::class, 'ringtoneDetails'])->name('ringtone-details');
Route::post('ringtones/download/{id}', [HomeController::class, 'downloadRingtone'])->name('ringtone-download');
