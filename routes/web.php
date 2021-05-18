<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UsersController;
use App\Notifications\PostPublished;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;
use Telegram\Bot\Laravel\Facades\Telegram;
use NotificationChannels\Telegram\TelegramChannel;

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

Route::group(['middleware' => 'auth'],function () {

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
    Route::get('posts/download/{id}', [App\Http\Controllers\PostController::class, 'downloadFile'])->name('posts.downloadFile');
//    Route::get('toTelegram/{post}',[\App\Http\Controllers\PostController::class,'toTelegram']);

// Route Tags List
    Route::get('tags', [App\Http\Controllers\TagController::class, 'index'])->name('tags.index');
    Route::get('tags/edit/{id}', [App\Http\Controllers\TagController::class, 'edit'])->name('tags.edit');
    Route::patch('tags/update/{id}', [App\Http\Controllers\TagController::class, 'update'])->name('tags.update');
    Route::delete('tags/destroy/{id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('tags.destroy');

// Route Comment List
    Route::get('comment', [App\Http\Controllers\CommentController::class, 'index'])->name('comment.index');
// Route Comment Status Update
    Route::get('comment/update/{id}', [App\Http\Controllers\CommentController::class, 'update'])->name('comment.update');
// Route Comment Edit
    Route::get('comment/edit/{id}', [App\Http\Controllers\CommentController::class, 'edit'])->name('comment.edit');
// Route Comment Update
    Route::patch('comment/comupdate/{id}', [App\Http\Controllers\CommentController::class, 'comupdate'])->name('comment.comupdate');
// Route  Comment Delete
    Route::delete('comment/destroy/{id}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comment.destroy');

// Route Question List
    Route::resource('question', QuestionController::class);
    Route::resource('contact', ContactController::class);

// Route Page List
    Route::get('page', [App\Http\Controllers\PageController::class, 'index'])->name('page.index');
    Route::get('page/create', [App\Http\Controllers\PageController::class, 'create'])->name('page.create');
    Route::get('page/edit/{id}', [App\Http\Controllers\PageController::class, 'edit'])->name('page.edit');
    Route::post('page/store', [App\Http\Controllers\PageController::class, 'store'])->name('page.store');
    Route::patch('page/update/{id}', [App\Http\Controllers\PageController::class, 'update'])->name('page.update');
    Route::delete('page/destroy/{id}', [App\Http\Controllers\PageController::class, 'destroy'])->name('page.destroy');

//Site Setting route
    Route::get('setting', [\App\Http\Controllers\SiteController::class, 'index'])->name('setting.index');
    Route::get('setting/create', [\App\Http\Controllers\SiteController::class, 'create'])->name('setting.create');
    Route::post('setting/store', [\App\Http\Controllers\SiteController::class, 'store'])->name('setting.store');
    Route::get('setting/edit/{id}', [\App\Http\Controllers\SiteController::class, 'edit'])->name('setting.edit');
    Route::patch('setting/update/{id}', [\App\Http\Controllers\SiteController::class, 'update'])->name('setting.update');
//statistic route
	Route::resource('statistic',StatisticController::class);
	//logo route
	Route::resource('logo',LogoController::class);
});

Auth::routes();

