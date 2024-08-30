<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/corporate', [PageController::class, 'corporate'])->name('corporate');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'send'])->name('contact.send');
Route::get('/search', [PageController::class, 'search'])->name('search');
Route::get('/career', [CareerController::class, 'index'])->name('career');
Route::get('/career/{slug}', [CareerController::class, 'show'])->name('career.show');
Route::get('/brand', [BrandController::class, 'index'])->name('brand');
Route::get('/brand/{slug}', [BrandController::class, 'show'])->name('brand.show');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/event', [EventController::class, 'index'])->name('event');
Route::get('/event/{slug}', [ EventController::class, 'show'])->name('event.show');

Route::group(['prefix' => 'kitchen'], function () {
    Voyager::routes();
});
