<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

	Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

	Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

	Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
	Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

});

require __DIR__ . '/auth.php';
