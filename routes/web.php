<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\viewcustomerController;
use App\Http\Controllers\RoomstatusController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerChartController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ContactController;
use App\Models\Notification;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Hotel Management System
|--------------------------------------------------------------------------
*/

// Authentication / Admin Access
Route::get('/admin', function () {
    return view('auth.login');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Public Guest & Frontend Pages
Route::get('/', [FrontendController::class, 'frontend'])->name('fronted.view');
Route::get('/frontend/room', [FrontendController::class, 'frontendRoom'])->name('frontend.room');
Route::get('/frontend/about', [FrontendController::class, 'frontendAbout'])->name('frontend.about');
Route::get('/frontend/contact', [FrontendController::class, 'frontendContact'])->name('frontend.contact');
Route::post('/send-message', [ContactController::class, 'store'])->name('contact.send');

// Authenticated Admin / Staff Routes
Route::middleware('auth')->group(function () {
    // User Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Room Management
    Route::resource('room', RoomController::class);
    Route::get('/room/{id}/activate', [RoomController::class, 'activate'])->name('room.activate');
    Route::get('/room/{id}/deactivate', [RoomController::class, 'deactivate'])->name('room.deactivate');

    // Room Type Management
    Route::resource('type', TypeController::class);
    Route::get('/type/{id}/activate', [TypeController::class, 'activate'])->name('type.activate');
    Route::get('/type/{id}/deactivate', [TypeController::class, 'deactivate'])->name('type.deactivate');

    // Room Status Management
    Route::resource('roomstatus', RoomstatusController::class);
    Route::get('/roomstatus/{id}/activate', [RoomstatusController::class, 'activate'])->name('roomstatus.activate');
    Route::get('/roomstatus/{id}/deactivate', [RoomstatusController::class, 'deactivate'])->name('roomstatus.deactivate');

    // Customer & Booking Management
    Route::resource('customer', CustomerController::class);
    Route::resource('viewcustomer', viewcustomerController::class);

    // Notifications & Invoicing
    Route::get('/notifications', function () {
        return response()->json([
            'notifications' => Notification::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get()
        ]);
    })->name('notifications');
    Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::get('/notifications/count', [InvoiceController::class, 'getUnreadCount'])->name('notifications.count');
    Route::post('/notifications/mark-as-read', [InvoiceController::class, 'markAsRead'])->name('notifications.markAsRead');

    // Analytics & Charts
    Route::get('/customer-chart', [CustomerChartController::class, 'getChartData'])->name('customer.chart');
    Route::get('/customer-data', [CustomerChartController::class, 'getCustomerData']);
    Route::get('/customer-list', [CustomerChartController::class, 'getCustomerList'])->name('customer.list');
});

require __DIR__.'/auth.php';
