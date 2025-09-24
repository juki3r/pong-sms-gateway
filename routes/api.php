<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SmsGatewayController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/send-sms', [SmsGatewayController::class, 'sendSms']);
});

Route::post('/send-sms-api', [SmsGatewayController::class, 'sendSmsAPI']);
Route::get('/fetch-sms', [SmsGatewayController::class, 'fetchSms']);
Route::post('/update-sms-status', [SmsGatewayController::class, 'updateSmsStatus']);
Route::post('/ping', [SmsGatewayController::class, 'ping']);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/email/resend', [AuthController::class, 'resendVerificationEmail']);
});

Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
    ->middleware('signed')
    ->name('verification.verify');













Route::get('/test-api', function () {
    return response()->json(['success' => true]);
});
