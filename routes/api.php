<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\RoomstatusController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ContactMessageController;
use App\Http\Controllers\Api\NotificationController;

Route::apiResource('rooms', RoomController::class);
Route::apiResource('types', TypeController::class);
Route::apiResource('room-statuses', RoomstatusController::class);
Route::apiResource('customers', CustomerController::class);
Route::apiResource('contact-messages', ContactMessageController::class);
Route::apiResource('notifications', NotificationController::class);
