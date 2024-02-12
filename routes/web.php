<?php

use App\Models\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::view('/', 'welcome');

Route::get('/event/{id}', function ($id) {
    return view('event', ['item' => Event::find($id)]);
});

Route::get('/event/checkin/{id}/web', [EventController::class, 'webCheckin'])
    ->middleware(['auth'])
    ->name('event.checkin');

Route::get('/event/checkin/{id}/qrcode', function($id) {
    return view('qrcheckin', ['eid' => $id]);
})
    ->name('event.qrcheckin');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth','admin', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'dashboard-admin')->name('dashboard');
    Route::view('/jobfair', 'jobfair-admin')->name('jobfair');
});

require __DIR__.'/auth.php';

Route::get('/tes', function() {
    return Auth::user();
});
