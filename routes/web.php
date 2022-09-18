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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentSystem;
use App\Http\Controllers\LikeSystemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;




# For unauthorized users 
Route::middleware('guest')->group(function () {
	Route::get('/login', [AuthController::class, 'GetLogin'])->name('auth.login');
	Route::post('/login', [AuthController::class, 'PostLogin'])->name('login');
	Route::get('/registration', [AuthController::class, 'GetSignup']);
	Route::post('/registration', [AuthController::class, 'PostSignup'])->name('signin');
});
# For all users

Route::get('/news', [ArticlesController::class, 'ViewPosts'])->name('articles');
Route::get('/news/{id}', [ArticlesController::class, 'ViewPost'])->name('article');


# For authorized users only
Route::group(['middleware' => 'auth'], function () {

	Route::post('/news/{id}', [CommentSystem::class, 'SaveComment'])->name('comment.save');

	Route::get('/profile', [UserController::class, 'GetProfile'])->name('profile');
	Route::get('/logout', function () {
		Auth::logout();
		return redirect('/login');
	})->name('logout');
});
