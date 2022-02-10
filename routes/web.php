<?php

use App\Http\Controllers\api\ArticleApiController;
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
Route::post('contactUs', [ContactUsController::class, 'send'])->name('contactUs.send')
    ->middleware('log.activity:sendContactUs');

Route::get('/api/articles/most-popular',  [ArticleApiController::class, 'readMostPopularArticles']);
Route::get('/api/articles',  [ArticleApiController::class, 'readAllArticles']);
Route::get('/api/articles/{id}',  [ArticleApiController::class, 'readOneArticle']);
Route::delete('/api/articles/{id}',  [ArticleApiController::class, 'deleteArticle']);
Route::post('/api/articles/',  [ArticleApiController::class, 'createArticle']);
