<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('/certificates/{certificate}', [CertificateController::class, 'generatePdf'])->name('certificates.generate');
});
