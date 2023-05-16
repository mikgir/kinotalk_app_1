<?php

namespace App\Providers;

use App\Http\Contracts\Parser;
use App\Http\Services\KinonewsParserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Parser::class, KinonewsParserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
