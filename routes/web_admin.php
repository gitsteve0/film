<?php

use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DirectorController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SeasonController;
use App\Http\Controllers\Admin\SeasonEpisodeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VerificationController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::controller(LoginController::class)
    ->middleware('guest')
    ->group(function () {
        Route::get('/a-login', 'create')->name('admin.login');
        Route::post('/a-login', 'store')->middleware(ProtectAgainstSpam::class);
    });

Route::controller(LoginController::class)
    ->middleware('auth')
    ->group(function () {
        Route::post('/a-logout', 'destroy')->name('admin.logout');
    });

Route::middleware('auth')
    ->prefix('/admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('customers', CustomerController::class)->except(['create', 'store']);
        Route::resource('verifications', VerificationController::class)->only(['index']);
        Route::resource('seasons', SeasonController::class);
        Route::resource('seasonEpisodes', SeasonEpisodeController::class);
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('attributes', AttributeController::class)->except(['show']);
        Route::resource('actors', ActorController::class)->except(['show']);
        Route::resource('directors', DirectorController::class)->except(['show']);
        Route::resource('attributeValues', AttributeValueController::class)->except(['index', 'show']);
        Route::resource('users', UserController::class)->except(['show']);
    });