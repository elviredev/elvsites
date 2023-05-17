<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * PARTIE CLIENT
 */
$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/sites', [\App\Http\Controllers\SiteController::class, 'index'])->name('site.index');
Route::get('/sites/{slug}-{site}', [\App\Http\Controllers\SiteController::class, 'show'])->name('site.show')->where([
    'slug' => $slugRegex,
    'site' => $idRegex
]);
Route::post('/sites/{site}/contact', [\App\Http\Controllers\SiteController::class, 'contact'])->name('site.contact')->where(['site' => $idRegex]);


/**
 * PARTIE ADMINISTRATION
 */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('site', \App\Http\Controllers\Admin\SiteController::class)->except(['show']);
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class)->except(['show']);
    Route::resource('technology', \App\Http\Controllers\Admin\TechnologyController::class)->except(['show']);
});
