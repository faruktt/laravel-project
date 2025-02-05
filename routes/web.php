<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\viewcustomerController;
use App\Http\Controllers\RoomstatusController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerChartController;
use App\Models\Notification;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
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
    Route::resource('viewcustomer', viewcustomerController::class);

    Route::get('/notifications', function () {
        return response()->json([
            'notifications' => Notification::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get()
        ]);
    })->name('notifications');
    Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::get('/notifications/count', [InvoiceController::class, 'getUnreadCount'])->name('notifications.count');
    Route::post('/notifications/mark-as-read', [InvoiceController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::get('/customer-chart', [CustomerChartController::class, 'getChartData'])->name('customer.chart');
Route::get('/customer-list', [CustomerChartController::class, 'getCustomerList'])->name('customer.list');


});

require __DIR__.'/auth.php';
