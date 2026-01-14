<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Trang chủ - dùng file home.blade.php
Route::get('/', [HomeController::class, 'index'])->name('home');

// Feedback (guest OK)
Route::post('/feedback', [HomeController::class, 'feedback'])->name('feedback.store');

// Submit ảnh (yêu cầu login)
Route::middleware('auth')->group(function () {
    Route::post('/contribute', [HomeController::class, 'contribute'])->name('contribute.store');
});

// Import auth từ Breeze
require __DIR__.'/auth.php';