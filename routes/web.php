<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\ProjectGalleryController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Auth\LoginController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::resource('users', UserController::class);
Route::resource('projects', ProjectController::class);
Route::resource('technologies', TechnologyController::class);
Route::resource('urls', UrlController::class);
Route::resource('galleries', GalleryController::class);
Route::resource('projectgalleries', ProjectGalleryController::class);
