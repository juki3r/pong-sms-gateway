<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Api\SmsGatewayController;
// require base_path('routes/api.php');

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth:sanctum')->group(function () {
    Route::post('/send-sms', [SmsGatewayController::class, 'sendSms']);
});



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/send_sms', [DashboardController::class, 'send_sms'])->name('send_sms');
    Route::post('/send-sms', [DashboardController::class, 'sendSms'])->name('sms.send');

    Route::get('/message-status', [DashboardController::class, 'messageStatus'])->name('messages.status');

    Route::get('/credits', [DashboardController::class, 'credits'])->name('credits');

    Route::post('/buy-credits', [PaymentController::class, 'buyCredits'])->name('buy.credits');
    Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/failed', [PaymentController::class, 'failed'])->name('payment.failed');
    Route::post('/paymongo-webhook', [PaymentController::class, 'handleWebhook']);


    Route::middleware('can:isAdmin')->group(function () {
        Route::get('/admin/logs', [DashboardController::class, 'adminLogs'])->name('admin.logs');
    });
});

Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::get('/admin/credits', [DashboardController::class, 'creditPanel'])->name('admin.credits');
    Route::post('/admin/add-credits', [DashboardController::class, 'addCredits'])->name('admin.addCredits');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
