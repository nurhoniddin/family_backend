<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuestionController;
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

Route::get('/', function () {
    return view('auth.login');
});
//Route::group(['middleware' => 'auth'],function (){
//});
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Category  List
Route::get('category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::get('category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::patch('category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::delete('category/destroy/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('category/show/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');

// Route Posts List
Route::get('posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::get('posts/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::post('posts/store', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::patch('posts/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
Route::delete('posts/destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
Route::get('posts/show/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

// Route Tags List
Route::get('tags', [App\Http\Controllers\TagController::class, 'index'])->name('tags.index');
Route::delete('tags/destroy/{id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('tags.destroy');

// Route Question List
Route::resource('question',QuestionController::class);
Route::resource('contact',ContactController::class);

Auth::routes();

