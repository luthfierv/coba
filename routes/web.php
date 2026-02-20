<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RelawanVerificationController;
use App\Http\Controllers\PublicPageController;
use App\Http\Controllers\RelawanRegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicPageController::class, 'index'])->name('home');
Route::get('/artikel', [PublicPageController::class, 'artikel'])->name('artikel.index');
Route::get('/artikel/{slug}', [PublicPageController::class, 'showArtikel'])->name('artikel.show');
Route::get('/status-relawan', [PublicPageController::class, 'statusRelawan'])->name('status-relawan.index');
Route::post('/status-relawan', [PublicPageController::class, 'checkStatusRelawan'])
    ->middleware('throttle:30,1')
    ->name('status-relawan.check');
Route::get('/kontak-relawan', [PublicPageController::class, 'kontakRelawan'])->name('kontak-relawan.index');

Route::get('/daftar-relawan', [RelawanRegistrationController::class, 'create'])->name('relawan.create');
Route::post('/daftar-relawan', [RelawanRegistrationController::class, 'store'])
    ->middleware('throttle:15,1')
    ->name('relawan.store');

Route::middleware('guest')->group(function (): void {
    Route::get('/admin', [AdminAuthController::class, 'create'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'store'])
        ->middleware('throttle:20,1')
        ->name('admin.login.store');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function (): void {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/relawans', [RelawanVerificationController::class, 'index'])->name('relawans.index');
    Route::get('/relawans/{relawan}', [RelawanVerificationController::class, 'show'])->name('relawans.show');
    Route::patch('/relawans/{relawan}/approve', [RelawanVerificationController::class, 'approve'])->name('relawans.approve');
    Route::patch('/relawans/{relawan}/reject', [RelawanVerificationController::class, 'reject'])->name('relawans.reject');
    Route::patch('/relawans/{relawan}/nonaktifkan', [RelawanVerificationController::class, 'nonaktifkan'])->name('relawans.nonaktifkan');
    Route::patch('/relawans/{relawan}/publish-contact', [RelawanVerificationController::class, 'publishContact'])
        ->name('relawans.publish-contact');
    Route::patch('/relawans/{relawan}/hide-contact', [RelawanVerificationController::class, 'hideContact'])
        ->name('relawans.hide-contact');
    Route::get('/relawans/{relawan}/files/{relawanFile}/download', [RelawanVerificationController::class, 'downloadFile'])
        ->name('relawans.files.download');
    Route::get('/logs', [ActivityLogController::class, 'index'])->name('logs.index');
    Route::resource('/artikels', \App\Http\Controllers\Admin\ArtikelController::class);
    Route::post('/logout', [AdminAuthController::class, 'destroy'])->name('logout');
});
