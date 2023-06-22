<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Author\AuthorController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Main\MainController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Profile\UserProfileController;
use App\Http\Controllers\Mail\MailController;
use App\Http\Controllers\Social\SocialLinkController;
use App\Http\Controllers\Support\SupportController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use MoonShine\Http\Controllers\DashboardController;

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
Route::get('/articles', [ArticleController::class, 'index'])
    ->name('articles');
Route::get('/articles/category', [ArticleController::class, 'showCategory'])
    ->name('articles.category');
Route::get('/articles/{id}', [ArticleController::class, 'show'])
    ->where('id', '\d+')
    ->name('articles.show');
Route::get('/authors', [AuthorController::class, 'index'])
    ->name('authors');
Route::get('/authors/{id}', [AuthorController::class, 'show'])
    ->where('id', '\d+')
    ->name('authors.show');
Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');
Route::get('/support', [SupportController::class, 'index'])
    ->name('support');

Route::get('/becomeAuthor/{id}', [MailController::class, 'sendEmailBecomeAuthor'])
    ->where('id', '\d+')
    ->name('becomeAuthor');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'index'])
        ->name('profile.show');
    Route::get('/profile/create', [UserProfileController::class, 'create'])
        ->name('profile.create');
    Route::post('profile/store/{id}', [UserProfileController::class, 'store'])
        ->where('id', '\d+')
        ->name('profile.store');
    Route::get('/profile/edit/{id}', [UserProfileController::class, 'edit'])
        ->where('id', '\d+')
        ->name('profile.edit');
    Route::patch('/profile/update/{id}', [UserProfileController::class, 'update'])
        ->where('id', '\d+')
        ->name('profile.update');
    Route::patch('/profile/user/{id}', [UserProfileController::class, 'userUpdate'])
        ->where('id', '\d+')
        ->name('profile.user_update');
    Route::put('/profile/avatar/{id}', [UserProfileController::class, 'avatarUpdate'])
        ->where('id', '\d+')
        ->name('profile.avatar_update');
    Route::delete('/profile/destroy/{id}', [UserProfileController::class, 'destroy'])
        ->where('id', '\d+')
        ->name('profile.destroy');

    Route::get('/social_link/create', [SocialLinkController::class, 'create'])
        ->name('social_link.create');
    Route::post('/social_link/store', [SocialLinkController::class, 'store'])
        ->name('social_link.store');
    Route::get('/social_link/edit/{id}', [SocialLinkController::class, 'edit'])
        ->where('id', '\d+')
        ->name('social_link.edit');
    Route::post('/social_link/update/{id}', [SocialLinkController::class, 'update'])
        ->where('id', '\d+')
        ->name('social_link.update');
    Route::delete('/social_link/delete/{id}', [SocialLinkController::class, 'destroy'])
        ->where('id', '\d+')
        ->name('social_link.delete');

    Route::get('/articles/create', [ArticleController::class, 'create'])
        ->name('articles.create');
    Route::post('/articles/store', [ArticleController::class, 'store'])
        ->name('articles.store');
    Route::patch('/articles/publish/{id}', [ArticleController::class, 'publish'])
        ->where('id', '\d+')
        ->name('articles.publish');
    Route::get('/articles/edit/{id}', [ArticleController::class, 'edit'])
        ->where('id', '\d+')
        ->name('articles.edit');
    Route::post('/articles/update/{id}', [ArticleController::class, 'update'])
        ->where('id', '\d+')
        ->name('articles.update');
    Route::delete('/articles/destroy/{id}', [ArticleController::class, 'destroy'])
        ->where('id', '\d+')
        ->name('articles.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Кэш очищен.";
});
