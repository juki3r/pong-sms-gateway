<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/messages/status', [DashboardController::class, 'status'])->name('messages.status');

    Route::post('/send/message', [DashboardController::class, 'sendSms'])->name('sendSms');

    Route::delete('/sms/delete/{user_id}', [DashboardController::class, 'deleteAll'])
        ->name('deleteSms');

    Route::get('/rent/simcard', [DashboardController::class, 'rentsimcard'])->name('rentSim');
    Route::get('/rent/simcard/upload', [DashboardController::class, 'uploadData'])->name('uploadData');
    Route::post('/rent/store', [DashboardController::class, 'storeRentSimcard'])->name('sim.store');


    //Firmwares
    Route::get('/firmwares', [DashboardController::class, 'showFirmwares'])->name('firmwares');
    Route::post('/firmwares/add', [DashboardController::class, 'storeFirmware'])->name('firmwares.store');
    Route::delete('/firmwares/{id}', [DashboardController::class, 'destroyFirmware'])->name('firmwares.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
