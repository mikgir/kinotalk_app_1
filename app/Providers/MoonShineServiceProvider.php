<?php

namespace App\Providers;

use App\Admin\Resources\ArticleResource;
use App\Admin\Resources\CategoryResource;
use App\Admin\Resources\NewsResource;
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
            MenuGroup::make('moonshine::ui.resource.system', [
                MenuItem::make('moonshine::ui.resource.admins_title', new MoonShineUserResource())
                    ->translatable()
                    ->icon('users'),
                MenuItem::make('moonshine::ui.resource.role_title', new MoonShineUserRoleResource())
                    ->translatable()
                    ->icon('bookmark'),
            ])->translatable(),
            MenuGroup::make('Пользователи', [
                MenuItem::make('Пользователи', new UserResource())
            ]),
            MenuGroup::make('Контент', [
                MenuItem::make('Категории', new CategoryResource()),
                MenuItem::make('Статьи', new ArticleResource()),
                MenuItem::make('Новости', new NewsResource()),
            ])->icon('app'),
        ]);
    }
}
