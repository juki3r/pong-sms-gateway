<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FirmwareController;
use App\Http\Controllers\Api\SmsGatewayController;


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/send-sms', [SmsGatewayController::class, 'sendSms']);
});

Route::post('/send-sms-api', [SmsGatewayController::class, 'sendSmsAPI']);

//Demo
Route::get('/fetch-sms', [SmsGatewayController::class, 'fetchSms']);
Route::post('/update-sms-status', [SmsGatewayController::class, 'updateSmsStatus']);

//Client
Route::get('/fetch-sms/client/{user_id}', [SmsGatewayController::class, 'fetchSmsClient']);
Route::post('/update-sms-status/client', [SmsGatewayController::class, 'updateSmsStatusClient']);
//Recive SMS
Route::post('/receive-sms', [SmsGatewayController::class, 'receiveSMS']);

//Firmware Updates
Route::get('/firmware/version/{device_name}', [FirmwareController::class, 'version']);
Route::get('/firmware/download/{device_name}', [FirmwareController::class, 'download']);




Route::post('/ping', [SmsGatewayController::class, 'ping']);















Route::get('/test-api', function () {
    return response()->json(['success' => true]);
});
