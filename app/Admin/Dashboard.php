<?php

namespace App\Admin;

use App\Admin\Resources\ArticleResource;
use App\Admin\Resources\NewsResource;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use MoonShine\Dashboard\DashboardBlock;
use MoonShine\Dashboard\DashboardScreen;
use MoonShine\Dashboard\ResourcePreview;
use MoonShine\Metrics\ValueMetric;
use MoonShine\Traits\Fields\LinkTrait;
use Spatie\Permission\Models\Role;

class Dashboard extends DashboardScreen
{
    public function blocks(): array
    {
        return [
            DashboardBlock::make([
                ValueMetric::make('Пользователей')
                    ->value(User::query()
                        ->count()
                    )->columnSpan(2),
                ValueMetric::make('Ролей')
                    ->value(Role::query()
                        ->count()
                    )->columnSpan(2),
                ValueMetric::make('Категорий')
                    ->value(Category::query()
                    ->count()
                    )->columnSpan(2),
                ValueMetric::make('Статей')
                    ->value(Article::query()
                        ->count()
                    )->columnSpan(2),
                ValueMetric::make('Комментариев')
                    ->value(Comment::query()->count())
                    ->columnSpan(2),
                ValueMetric::make('Новостей')
                    ->value(News::query()
                        ->count()
                    )->columnSpan(2)
            ]),
            DashboardBlock::make([

            ]),
            DashboardBlock::make([
                ResourcePreview::make(
                    new ArticleResource(),
                    'Статьи в ожидании публикации',
                    Article::query()
                        ->where('status', 'PENDING')
                        ->limit(10)
                )
            ]),
            DashboardBlock::make([
                ResourcePreview::make(
                    new NewsResource(),
                    'Последние новости',
                    News::query()
                        ->latest()
                        ->limit(5)
                )
            ])
        ];
    }
}
