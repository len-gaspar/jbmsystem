<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// The Dashboard route required by Laravel Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes required by Laravel Breeze's navigation layout
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Job Board and Application routes (Protected by Auth middleware)
Route::middleware(['auth'])->group(function () {
    // 1. Job Listings & Management
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

    // 2. Job Application Process
    Route::get('/jobs/{job}/apply', [JobController::class, 'apply'])->name('jobs.apply');
    Route::post('/jobs/{job}/apply', [JobController::class, 'submitApplication'])->name('jobs.apply.submit');

    Route::get('/my-applications', [JobController::class, 'myApplications'])->name('applications.index');
});

Route::resource('jobs', JobController::class);

Route::get('/applications/approvals', [ApplicationController::class, 'approvals'])->name('applications.approvals');

require __DIR__.'/auth.php';