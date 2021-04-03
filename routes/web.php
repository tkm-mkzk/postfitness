<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::group(['prefix' => 'login'], function(){
    Route::get('guest', [LoginController::class, 'guestLogin'])->name('login.guest');
    Route::get('{provider}', [LoginController::class, 'redirectToProvider'])->name('login.{provider}');
    Route::get('{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('login.{provider}.callback');
});

Route::group(['prefix' => 'register'], function(){
    Route::get('{provider}', [RegisterController::class, 'showProviderUserRegistrationForm'])->name('register.{provider}');
    Route::post('{provider}', [RegisterController::class, 'registerProviderUser'])->name('register.{provider}');
});

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'blog', 'middleware' => 'auth'], function(){
    Route::get('create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('show/{id}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::post('destroy/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::get('destroy/{id}', [BlogController::class, 'index']);
});

Route::get('blog/index', [BlogController::class, 'index'])->name('blog.index');

Route::group(['prefix' => 'weight', 'middleware' => 'auth'], function(){
    Route::get('index', [WeightController::class, 'index'])->name('weight.index');
    Route::get('create', [WeightController::class, 'create'])->name('weight.create');
    Route::post('store', [WeightController::class, 'store'])->name('weight.store');
    Route::get('show/{id}', [WeightController::class, 'show'])->name('weight.show');
    Route::get('edit/{id}', [WeightController::class, 'edit'])->name('weight.edit');
    Route::post('update/{id}', [WeightController::class, 'update'])->name('weight.update');
    Route::post('destroy/{id}', [WeightController::class, 'destroy'])->name('weight.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'user'], function() {
    Route::get('show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('show/{id}/likes', [UserController::class, 'likes'])->name('user.likes');
    Route::get('show/{id}/followings', [UserController::class, 'followings'])->name('user.followings');
    Route::get('show/{id}/followers', [UserController::class, 'followers'])->name('user.followers');
    Route::group(['middleware' => 'auth'], function() {
        Route::put('show/{id}/follow', [UserController::class, 'follow'])->name('user.follow');
        Route::delete('show/{id}/follow', [UserController::class, 'unfollow'])->name('user.unfollow');
    });
});

Route::group(['prefix' => 'blog', 'middleware' => 'auth'], function() {
    Route::put('{blog}/like', [BlogController::class, 'like'])->name('blog.like');
    Route::delete('{blog}/like', [BlogController::class, 'unlike'])->name('blog.unlike');
});

Route::get('/tags/{name}', [TagController::class, 'show'])->name('tag.show');
