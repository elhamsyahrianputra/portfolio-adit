<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\CollaborationController;

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
    Route::post('/logout','logout')->middleware('auth');
    Route::put('/admin/user/settings','updateSettings')->middleware('auth');
});



// * Admin
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
    Route::get('/user/settings', [DashboardController::class, 'settings'])->middleware('auth');
    Route::resource('/carousels', CarouselController::class)->middleware('auth')->only('index', 'store', 'destroy');
    Route::resource('/skills', SkillController::class)->middleware('auth')->only('index', 'store', 'destroy', 'update');
    Route::resource('/profiles', ProfileController::class)->middleware('auth')->only('show', 'update');
    Route::resource('/educations', EducationController::class)->middleware('auth')->only('store', 'update', 'destroy');
    Route::resource('/experiences', ExperienceController::class)->middleware('auth')->only('store', 'update', 'destroy');
    Route::resource('/collaborations', CollaborationController::class)->middleware('auth')->only('index', 'store', 'update', 'destroy');
    Route::resource('/articles', ArticleController::class)->middleware('auth');
    Route::resource('/portfolios', PortfolioController::class)->middleware('auth')->except('edit', 'show');
    Route::resource('/videos', VideoController::class)->middleware('auth');
    Route::resource('/messages', MessageController::class)->middleware('auth')->only('index', 'destroy');
});

// Landing Page
Route::get('/', [LandingPageController::class, 'index']);
Route::get('/portfolio/{portfolio:id}', [LandingPageController::class, 'portfolio']);
Route::get('/article/{article:slug}', [LandingPageController::class, 'article']);
Route::get('/video/{video:slug}', [LandingPageController::class, 'video']);
Route::post('/message', [LandingPageController::class, 'messageStore']);

