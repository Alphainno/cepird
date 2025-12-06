<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\FocusAreaController;
use App\Http\Controllers\Admin\VisionController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\FounderController;
// Route::get('/', function () {

// })->name('home');
Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::get('/focus-areas', [LandingPageController::class, 'focusAreas'])->name('focus-areas');
Route::get('/programs', [LandingPageController::class, 'programs'])->name('programs');
Route::get('/founder', [LandingPageController::class, 'founder'])->name('founder');
Route::get('/contact', [LandingPageController::class, 'contact'])->name('contact');

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

// Admin Hero Section Routes
Route::get('/admin/hero', [HeroSectionController::class, 'index'])->name('admin.hero.index');
Route::put('/admin/hero', [HeroSectionController::class, 'update'])->name('admin.hero.update');
Route::post('/admin/hero', [HeroSectionController::class, 'update'])->name('admin.hero.store');

// Admin About Section Routes
Route::get('/admin/about', [AboutSectionController::class, 'index'])->name('admin.about.index');
Route::put('/admin/about', [AboutSectionController::class, 'update'])->name('admin.about.update');
Route::post('/admin/about', [AboutSectionController::class, 'update'])->name('admin.about.store');

// Admin Focus Areas Routes
Route::get('/admin/focus-areas', [FocusAreaController::class, 'index'])->name('admin.focus-areas.index');
Route::put('/admin/focus-areas', [FocusAreaController::class, 'update'])->name('admin.focus-areas.update');
Route::post('/admin/focus-areas', [FocusAreaController::class, 'update'])->name('admin.focus-areas.store');

// Admin Vision Routes
Route::get('/admin/vision', [VisionController::class, 'index'])->name('admin.vision.index');
Route::put('/admin/vision', [VisionController::class, 'update'])->name('admin.vision.update');
Route::post('/admin/vision', [VisionController::class, 'update'])->name('admin.vision.store');

// Admin Programs Routes
Route::get('/admin/programs', [ProgramController::class, 'index'])->name('admin.programs.index');
Route::post('/admin/programs', [ProgramController::class, 'store'])->name('admin.programs.store');
Route::put('/admin/programs/{program}', [ProgramController::class, 'update'])->name('admin.programs.update');
Route::delete('/admin/programs/{program}', [ProgramController::class, 'destroy'])->name('admin.programs.destroy');

// Admin Founder Routes
Route::get('/admin/founder', [FounderController::class, 'index'])->name('admin.founder.index');
Route::put('/admin/founder', [FounderController::class, 'update'])->name('admin.founder.update');
Route::post('/admin/founder', [FounderController::class, 'update'])->name('admin.founder.store');

// Admin CTA Routes
Route::get('/admin/cta', [App\Http\Controllers\Admin\CtaController::class, 'index'])->name('admin.cta.index');
Route::put('/admin/cta', [App\Http\Controllers\Admin\CtaController::class, 'update'])->name('admin.cta.update');
Route::post('/admin/cta', [App\Http\Controllers\Admin\CtaController::class, 'update'])->name('admin.cta.store');

// Admin About Hero Routes
Route::get('/admin/about/hero', [App\Http\Controllers\Admin\AboutHeroController::class, 'index'])->name('admin.about.hero.index');
Route::put('/admin/about/hero', [App\Http\Controllers\Admin\AboutHeroController::class, 'update'])->name('admin.about.hero.update');
Route::post('/admin/about/hero', [App\Http\Controllers\Admin\AboutHeroController::class, 'update'])->name('admin.about.hero.store');
