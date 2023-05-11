<?php

namespace App\Admin;

use App\Admin\Resources\ArticleResource;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use MoonShine\Dashboard\DashboardBlock;
use MoonShine\Dashboard\DashboardScreen;
use MoonShine\Dashboard\ResourcePreview;
use MoonShine\Metrics\ValueMetric;
use Spatie\Permission\Models\Role;

class Dashboard extends DashboardScreen
{
    public function blocks(): array
    {
        return [
            DashboardBlock::make([
                ValueMetric::make('Пользователей')
                    ->value(User::query()->count())->columnSpan(3),
                ValueMetric::make('Ролей')
                    ->value(Role::query()->count())->columnSpan(3),
                ValueMetric::make('Категорий')->value(Category::query()
                    ->count())->columnSpan(3),
                ValueMetric::make('Статей')
                    ->value(Article::query()->count())->columnSpan(3)
            ]),
            DashboardBlock::make([
                ResourcePreview::make(
                    new ArticleResource(),
                    'Черновики статей',
                    Article::query()->where('status', 'DRAFT')->limit(5)
                )
            ])
        ];
    }
}
