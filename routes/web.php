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

Route::get('/', function () {
    return view('auth.login');
});
//Route::group(['middleware' => 'auth'],function (){
//});
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Category  list
Route::get('category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::get('category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::patch('category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::delete('category/destroy/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('category/show/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');



Auth::routes();

