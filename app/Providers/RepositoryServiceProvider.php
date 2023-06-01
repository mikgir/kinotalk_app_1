<?php

namespace App\Providers;

use \App\Contracts\ArticleRepositoryInterface;
use App\Contracts\CategoryRepositoryInterface;
use App\Contracts\NewsRepositoryInterface;
use App\Contracts\SourceRepositoryInterface;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use App\Repositories\SourceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(NewsRepositoryInterface::class, NewsRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(SourceRepositoryInterface::class, SourceRepository::class);
<<<<<<< HEAD
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
=======
>>>>>>> parent of f57fe52 (Authors, fix)
    }
}
