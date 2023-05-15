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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('site', \App\Http\Controllers\Admin\SiteController::class)->except(['show']);
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class)->except(['show']);
    Route::resource('technology', \App\Http\Controllers\Admin\TechnologyController::class)->except(['show']);
});
