<?php

use App\Models\Event;
use App\Livewire\Admin\EventShow;
use App\Livewire\Admin\EventCreate;
use App\Livewire\Admin\JobfairShow;
use App\Livewire\Admin\JobfairCreate;
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
    Route::view('/jobfair', 'jobfair-admin')->name('jobfair.index');
    Route::get('/jobfair/create', JobfairCreate::class)->name('jobfair.create');
    Route::get('/jobfair/{id}/read', JobfairShow::class)->name('jobfair.read');
    Route::get('/event/create', EventCreate::class)->name('event.create');
    Route::get('/event/{id}/read', EventShow::class)->name('event.read');
    Route::get('/event/{id}', function ($id) {
        return view('event-admin', ['eid' => $id]);
    })->name('event.kehadiran');
});

require __DIR__.'/auth.php';

Route::get('/tes', function() {
    return Auth::user();
});
