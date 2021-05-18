<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//contact routes
//Route::get('contact', [\App\Http\Controllers\Api\ContactController::class,'index']);
Route::post('contact/store',[\App\Http\Controllers\Api\ContactController::class,'store']);

// Route Category All
Route::get('/category', [\App\Http\Controllers\Api\CategoryController::class,'index'])->name('category');

// Route Posts All
Route::get('/posts', [\App\Http\Controllers\Api\PostController::class,'index'])->name('posts');
// Route Category id Post
Route::get('/posts/{category_id}', [\App\Http\Controllers\Api\PostController::class,'posts'])->name('posts');
// Route Post details
Route::get('/post/{id}', [\App\Http\Controllers\Api\PostController::class,'details'])->name('post');
// Route Post search
Route::post('/search', [\App\Http\Controllers\Api\PostController::class,'search'])->name('search');
// Route Post DownloadFile
Route::get('/downloadFile/{id}', [\App\Http\Controllers\Api\PostController::class,'downloadFile'])->name('downloadFile');

// Route Tags All
Route::get('/tags', [\App\Http\Controllers\Api\TagController::class,'index'])->name('tags');
// Route Tag search
Route::post('/tagsearch', [\App\Http\Controllers\Api\TagController::class,'tagsearch'])->name('tagsearch');

// Route Comment
Route::post('/comment', [\App\Http\Controllers\Api\CommentController::class,'store'])->name('comment');

// Route About Platform
Route::get('/page/{category_id}', [\App\Http\Controllers\Api\PageController::class,'index'])->name('page');

//site settings
Route::get('/setting', [\App\Http\Controllers\Api\SiteController::class,'index']);

//logo route
Route::get('logo',[\App\Http\Controllers\Api\LogoController::class,'index']);
//statistic route
Route::get('logo',[\App\Http\Controllers\Api\StatisticController::class,'index']);


