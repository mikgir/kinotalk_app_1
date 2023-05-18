<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Author\AuthorController;
use App\Http\Controllers\Main\MainController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Profile\UserProfileController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{id}', [ArticleController::class, 'show'])
    ->where('id', '\d+')
    ->name('articles.show');
Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
Route::get('/authors/{id}', [AuthorController::class, 'show'])
    ->where('id', '\d+')
    ->name('authors.show');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.show');
//    Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
