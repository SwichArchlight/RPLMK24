<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\ProfileController;
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
Route::middleware('guest')->group(function () {
Route::get("/login", [AuthController::class ,'login'])->name('login');
Route::get("/register", [AuthController::class ,'register'])->name('register');
Route::POST("/login", [AuthController::class ,'attempt'])->name('attempt');
Route::POST("/register", [AuthController::class ,'store'])->name('store_acc');
});

Route::middleware('auth')->group(function () {
Route::get("/logout", [AuthController::class ,'logout'])->name('logout');
Route::get('/',[PostController::class ,'index'])->name('home');
Route::get('/search',[SearchController::class ,'index'])->name('search');
Route::get('/album/{id}',[SearchController::class ,'album'])->name('album');
Route::get('/post/{id}',[PostController::class ,'show'])->name('show');
Route::get('/add', [PostController::class ,'add_post'])->name('post-add');
Route::get('/edit/{id}', [PostController::class ,'edit'])->name('edit');
Route::POST('/add', [PostController::class ,'store'])->name('store');
Route::POST('/edit/{id}', [PostController::class ,'update'])->name('update');
Route::POST('/delete/{id}', [PostController::class ,'destroy'])->name('delete');
Route::POST('/comment/{id}', [ActionController::class ,'comment'])->name('comment');
Route::POST('/like/{id}', [ActionController::class ,'like'])->name('like');
Route::get('/profile/{username}',[ProfileController::class ,'index'])->name('profile');
Route::get('/profile/edit/{id}',[ProfileController::class ,'edit'])->name('edit-profile');
Route::POST('/profile/edit/{id}',[ProfileController::class ,'update'])->name('update-profile');
});
