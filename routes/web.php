<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseQuizController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LectureController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('/certificates/{certificate}', [CertificateController::class, 'generatePdf'])->name('certificates.generate');
    Route::resource('courses', CourseController::class)->only('show');
    Route::resource('challenges', ChallengeController::class)->only('index', 'show');
    Route::post('/challenges/{challenge}/submit', [ChallengeController::class, 'submit'])->name('challenges.submit');
    Route::resource('courses.lectures', LectureController::class)->only('show');
    Route::resource('courses.course-quizzes', CourseQuizController::class)->only('show');
    Route::post('/courses/{course}/course-quizzes/{courseQuiz}/submit', [CourseQuizController::class, 'submit'])->name('courses.course-quizzes.submit');
});
