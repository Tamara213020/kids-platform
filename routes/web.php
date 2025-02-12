<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LectureController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('/certificates/{certificate}', [CertificateController::class, 'generatePdf'])->name('certificates.generate');
    Route::resource('courses', CourseController::class)->only('show');
    Route::resource('challenges', ChallengeController::class)->only('index');
    Route::resource('courses.lectures', LectureController::class)->only('show');
    Route::get('/test', function () {
        return Inertia::render('CodeBlocks/CodeExercise');
    });
});
