<?php

use App\Http\Controllers\Pagescontroller;
use App\Http\Controllers\Postcontroller;
use App\Http\Controllers\Commentairecontroller;
use App\Http\Controllers\CommentLikesController;
use App\Http\Controllers\PostLlikescontroller;
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

Route::get('/', [Pagescontroller::class,'index']
);
Route::resource('/posts', PostController::class)->middleware('auth');
Route::resource('/postlike', PostLlikesController::class)->middleware('auth');
Route::post('/posts/{post}/like', [PostLlikesController::class, 'store'])->middleware('auth');
Route::resource('/commentlike', CommentLikesController::class)->middleware('auth');
// Route::post('/comments/{comment}/like', [CommentLikesController::class, 'store'])->middleware('auth');

// Route::post('/posts/{post}/unlike', [PostLlikesController::class, 'destroy'])->middleware('auth');

Route::resource('/commentaire', CommentaireController::class)->middleware('auth');
Route::get('/search', [PostController::class,'search']
)->middleware('auth');
Route::get('/posts/category/{category}', [PostController::class,'category']
)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
