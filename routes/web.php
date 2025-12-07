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
use App\Http\Controllers\Admin\FocusAreaOutcomeController;
use App\Http\Controllers\Admin\ImpactMetricController;
use App\Http\Controllers\Admin\ImpactSectionController;
use App\Http\Controllers\Admin\ContactHeroSectionController;
use App\Http\Controllers\Admin\FocusAreaCtaSectionController;
use App\Http\Controllers\Admin\FocusAreaOutcomeSectionController;
use App\Http\Controllers\StrategicPillarController;
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
Route::put('/admin/focus-areas/{focusArea}', [FocusAreaController::class, 'updateFocusArea'])->name('admin.focus-areas.update-focus-area');

// Admin Focus Area Outcomes Routes
Route::get('/admin/focus-area-outcomes', [FocusAreaOutcomeController::class, 'index'])->name('admin.focus-area-outcomes.index');
Route::post('/admin/focus-area-outcomes', [FocusAreaOutcomeController::class, 'store'])->name('admin.focus-area-outcomes.store');
Route::put('/admin/focus-area-outcomes/{focusAreaOutcome}', [FocusAreaOutcomeController::class, 'update'])->name('admin.focus-area-outcomes.update');

// Admin Focus Area Outcome Section Routes
Route::get('/admin/focus-area-outcome-section', [FocusAreaOutcomeSectionController::class, 'index'])->name('admin.focus-area-outcome-section.index');
Route::put('/admin/focus-area-outcome-section', [FocusAreaOutcomeSectionController::class, 'update'])->name('admin.focus-area-outcome-section.update');

// Admin Impact Metrics Routes
Route::get('/admin/impact-metrics', [ImpactMetricController::class, 'index'])->name('admin.impact-metrics.index');
Route::post('/admin/impact-metrics', [ImpactMetricController::class, 'store'])->name('admin.impact-metrics.store');
Route::put('/admin/impact-metrics/{impactMetric}', [ImpactMetricController::class, 'update'])->name('admin.impact-metrics.update');

// Admin Impact Section Routes
Route::get('/admin/impact-section', [ImpactSectionController::class, 'index'])->name('admin.impact-section.index');
Route::put('/admin/impact-section', [ImpactSectionController::class, 'update'])->name('admin.impact-section.update');

// Admin Focus Area CTA Section Routes
Route::get('/admin/focus-area-cta-section', [FocusAreaCtaSectionController::class, 'index'])->name('admin.focus-area-cta-section.index');
Route::put('/admin/focus-area-cta-section', [FocusAreaCtaSectionController::class, 'update'])->name('admin.focus-area-cta-section.update');

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

// Admin Contact Hero Routes
Route::get('/admin/contact-hero', [ContactHeroSectionController::class, 'index'])->name('admin.contact-hero.index');
Route::put('/admin/contact-hero', [ContactHeroSectionController::class, 'update'])->name('admin.contact-hero.update');
Route::post('/admin/contact-hero', [ContactHeroSectionController::class, 'update'])->name('admin.contact-hero.store');

// Admin About Hero Routes
Route::get('/admin/about/hero', [App\Http\Controllers\Admin\AboutHeroController::class, 'index'])->name('admin.about.hero.index');
Route::put('/admin/about/hero', [App\Http\Controllers\Admin\AboutHeroController::class, 'update'])->name('admin.about.hero.update');
Route::post('/admin/about/hero', [App\Http\Controllers\Admin\AboutHeroController::class, 'update'])->name('admin.about.hero.store');

// Admin About Introduction Routes
Route::get('/admin/about/introduction', [App\Http\Controllers\Admin\AboutIntroductionController::class, 'index'])->name('admin.about.introduction.index');
Route::put('/admin/about/introduction', [App\Http\Controllers\Admin\AboutIntroductionController::class, 'update'])->name('admin.about.introduction.update');
Route::post('/admin/about/introduction', [App\Http\Controllers\Admin\AboutIntroductionController::class, 'update'])->name('admin.about.introduction.store');

// Admin Vision & Mission Routes
Route::get('/admin/vision-mission', [App\Http\Controllers\Admin\VisionMissionController::class, 'index'])->name('admin.vision-mission.index');
Route::post('/admin/vision-mission', [App\Http\Controllers\Admin\VisionMissionController::class, 'store'])->name('admin.vision-mission.store');

// Admin Core Values Routes
Route::get('/admin/core-values', [App\Http\Controllers\Admin\CoreValueController::class, 'index'])->name('admin.core-values.index');
Route::post('/admin/core-values', [App\Http\Controllers\Admin\CoreValueController::class, 'update'])->name('admin.core-values.store');

// Admin What We Do Routes
Route::get('/admin/what-we-do', [App\Http\Controllers\Admin\WhatWeDoController::class, 'index'])->name('admin.what-we-do.index');
Route::post('/admin/what-we-do', [App\Http\Controllers\Admin\WhatWeDoController::class, 'update'])->name('admin.what-we-do.store');

// Admin Program Initiatives Routes
Route::get('/admin/program-initiatives', [App\Http\Controllers\Admin\ProgramInitiativeController::class, 'index'])->name('admin.program-initiatives.index');
Route::post('/admin/program-initiatives', [App\Http\Controllers\Admin\ProgramInitiativeController::class, 'update'])->name('admin.program-initiatives.store');

// Admin Header Routes
Route::get('/admin/header', [App\Http\Controllers\Admin\HeaderController::class, 'index'])->name('admin.header.index');
Route::post('/admin/header', [App\Http\Controllers\Admin\HeaderController::class, 'update'])->name('admin.header.store');

// Admin Footer Routes
Route::get('/admin/footer', [App\Http\Controllers\Admin\FooterController::class, 'index'])->name('admin.footer.index');
Route::post('/admin/footer', [App\Http\Controllers\Admin\FooterController::class, 'store'])->name('admin.footer.store');

// Admin Focus Area Hero Routes
Route::get('/admin/focus-area-hero', [App\Http\Controllers\Admin\FocusAreaHeroSectionController::class, 'index'])->name('admin.focus-area-hero.index');
Route::put('/admin/focus-area-hero', [App\Http\Controllers\Admin\FocusAreaHeroSectionController::class, 'update'])->name('admin.focus-area-hero.update');
Route::post('/admin/focus-area-hero', [App\Http\Controllers\Admin\FocusAreaHeroSectionController::class, 'update'])->name('admin.focus-area-hero.store');

// Admin Strategic Pillars Routes
Route::get('/admin/strategic-pillars', [StrategicPillarController::class, 'index'])->name('admin.strategic-pillars.index');
Route::post('/admin/strategic-pillars', [StrategicPillarController::class, 'store'])->name('admin.strategic-pillars.store');
Route::put('/admin/strategic-pillars/{strategicPillar}', [StrategicPillarController::class, 'update'])->name('admin.strategic-pillars.update');
Route::delete('/admin/strategic-pillars/{strategicPillar}', [StrategicPillarController::class, 'destroy'])->name('admin.strategic-pillars.destroy');
