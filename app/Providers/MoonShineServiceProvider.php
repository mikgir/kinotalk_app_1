<?php

namespace App\Providers;

use App\Admin\Resources\ArticleResource;
use App\Admin\Resources\CategoryResource;
use App\Admin\Resources\NewsResource;
use App\Admin\Resources\ProfileResource;
use App\Admin\Resources\RoleResource;
use App\Admin\Resources\UserResource;
use Illuminate\Support\ServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app(MoonShine::class)->menu([
            MenuGroup::make('Система', [
                MenuItem::make('Пользователи', new UserResource())
                    ->icon('users'),
                MenuItem::make('Профили', new ProfileResource())
                    ->icon('heroicons.identification'),
                MenuItem::make('Роли', new RoleResource())
                    ->icon('bookmark'),
            ])->icon('heroicons.cog-6-tooth'),
            MenuGroup::make('Контент', [
                MenuItem::make('Категории', new CategoryResource())
                    ->icon('heroicons.document-text'),
                MenuItem::make('Статьи', new ArticleResource())
                    ->icon('heroicons.document-text'),
                MenuItem::make('Новости', new NewsResource())
                    ->icon('heroicons.newspaper'),
            ])->icon('app'),
        ]);
    }
}
