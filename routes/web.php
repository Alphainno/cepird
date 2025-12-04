<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DashboardController;
// Route::get('/', function () {

// })->name('home');
Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::get('/focus-areas', [LandingPageController::class, 'focusAreas'])->name('focus-areas');
Route::get('/programs', [LandingPageController::class, 'programs'])->name('programs');

// Route::get('/dashboard', function () {
//     return view('admin.login');
// })->name('admin.login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.login');
// Route::post('/dashboard', function () {
//     // Handle login logic here
//     return redirect()->route('admin.dashboard');
// })->name('admin.login');

Route::post('/dashboard', [DashboardController::class, 'authenticate'])->name('admin.login.perform');

Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');


