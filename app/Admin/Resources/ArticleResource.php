<?php

namespace App\Admin\Resources;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\Date;
use MoonShine\Fields\Image;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;

class ArticleResource extends Resource
{
    public static string $model = Article::class;
    public static string $title = 'Статьи';
    public static string $subTitle = 'Управление статьями';
    public string $titleField = 'title';
    public static int $itemsPerPage = 5;
    protected bool $editInModal = true;
    protected bool $createInModal = true;

    public function query(): Builder
    {
        return Article::with(['category', 'user']);
    }

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Grid::make([
                Column::make([
                    Block::make('Информация', [
                        BelongsTo::make('Категоия', 'category_id', 'name')
                            ->sortable(),
                        BelongsTo::make('Автор', 'user_id', 'name')->sortable(),
                        Text::make('title', 'title')
                            ->sortable(),
                        Text::make('seo title')
                            ->sortable(),
                        Date::make('Дата создания', 'created_at')
                            ->format('d.m.Y')
                            ->sortable(),
                        Date::make('Дата обновления', 'updated_at')
                            ->format('d.m.Y')
                            ->sortable()
                    ])
                ])->columnSpan(6),
                Column::make([
                    Block::make('Содержание', [
//                        MediaLibrary::make('Изображение', 'image'),
                        TinyMce::make('body')
                            // Переопределить набор плагинов
                            ->plugins('anchor')
                            // Добавление плагинов в базовый набор
                            ->addPlugins('code codesample')
                            // Переопределить набор toolbar
                            ->toolbar('undo redo | blocks fontfamily fontsize')
                            // Добавление toolbar в базовый набор
                            ->addToolbar('code codesample')
                            // Теги
                            ->mergeTags([
                                ['value' => 'tag', 'title' => 'Title']
                            ])
                            // Переопределение текущей локали
                            ->locale('ru')
                            ->hideOnIndex(),
                    ])
                ])->columnSpan(6)
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'title' => ['required', 'string', 'min:3'],
            'body' => ['required', 'string', 'min:3']
        ];
    }

    public function search(): array
    {
        return ['id', 'title'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
