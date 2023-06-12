<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// * Auth
Route::controller(AuthController::class)->group(function () {
    Route::get('/signup','registration')->middleware('guest');
    Route::post('/signup','store')->middleware('guest');
    Route::get('/login','login')->name('login')->middleware('guest');
    Route::post('/login','authenticate')->middleware('guest');
    Route::get('/logout','logout')->middleware('auth');
});



// * Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
    Route::resource('/portfolio', PortfolioController::class)->middleware('auth');
});

// Landing Page
Route::get('/', [LandingPageController::class, 'index']);
Route::get('/portfolio-details', [LandingPageController::class, 'portfolio']);
Route::get('/journal', [LandingPageController::class, 'journal']);
Route::get('/video', [LandingPageController::class, 'video']);

