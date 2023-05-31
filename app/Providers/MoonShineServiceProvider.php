<?php

namespace App\Providers;

use App\Admin\Resources\ArticleResource;
use App\Admin\Resources\CategoryResource;
use App\Admin\Resources\CommentResource;
use App\Admin\Resources\NewsResource;
use App\Admin\Resources\ProfileResource;
use App\Admin\Resources\RoleResource;
use App\Admin\Resources\SocialTypeResource;
use App\Admin\Resources\SourceResource;
use App\Admin\Resources\UserResource;
use App\Models\Article;
use App\Models\Comment;
use App\Models\News;
use App\Models\User;
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
                    ->badge(fn() => User::query()->count())
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
                    ->badge(fn() => Article::query()->count())
                    ->icon('heroicons.document-text'),
                MenuItem::make('Ресурс сайты', new SourceResource())
                    ->icon('heroicons.newspaper'),
                MenuItem::make('Новости', new NewsResource())
                    ->badge(fn() => News::query()->count())
                    ->icon('heroicons.newspaper'),
                MenuItem::make('Комментарии', new CommentResource())
                    ->badge(fn() => Comment::query()->count())
                    ->icon('heroicons.chat-bubble-bottom-center-text'),
                MenuItem::make('Соц-сети', new SocialTypeResource())
                    ->icon('heroicons.share'),
            ])->icon('app'),
        ]);
    }
}
