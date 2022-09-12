<?php

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
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommentSystem;
use App\Models\LikeSystemController;

Route::get('/news', [ArticlesController::class, 'ViewPosts'])->name('articles');
Route::get('/news/{id}', [ArticlesController::class, 'ViewPost'])->name('article');
Route::post('/news/{id}', [CommentSystem::class, 'SaveComment'])->name('comment.save');
Route::post('likesystem', [LikeSystemController::class, 'saveLikes'])->name('likesystem');
