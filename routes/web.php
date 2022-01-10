<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',  [HomeController::class, 'index']);
Route::get('/blog',  [BlogController::class, 'index'])->name('blog');
Route::get('/blog/article/{id}',  [ArticleController::class, 'show'])
    ->name('blogArticle');
Route::get('contacts', [ContactUsController::class, 'view'])->name('contactUs');
