<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomstatusController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('master');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('room', RoomController::class);
    Route::resource('type', TypeController::class);
    Route::resource('roomstatus', RoomstatusController::class);
    Route::resource('customer', CustomerController::class);

    Route::get('/filter-rooms', [CustomerController::class, 'filterRooms']);


});

require __DIR__.'/auth.php';
