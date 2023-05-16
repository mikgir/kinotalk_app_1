<?php

namespace App\Admin\Resources;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\Date;
use MoonShine\Fields\Image;
use MoonShine\Fields\Slug;
use MoonShine\Fields\SwitchBoolean;
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
    public static array $with = [
        'user',
        'category'
    ];
    public static int $itemsPerPage = 5;


    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Grid::make([
                Column::make([
                    Block::make('Основная информация', [
                        Collapse::make('Заголовок/Slug', [
                            Flex::make([
                                Text::make('title', 'title')
                                    ->sortable(),
                                Slug::make('Slug')
                                    ->from('title')
                                    ->separator('-')
                                    ->unique(),
                            ]),
                        ]),
                        Tabs::make([
                            Tab::make('Описание', [
                                TinyMce::make('Описание', 'body')
                                    // Переопределить набор плагинов
                                    ->plugins('anchor')
                                    // Переопределить набор toolbar
                                    ->toolbar('undo redo | blocks fontfamily fontsize')
                                    // Теги
                                    ->mergeTags([
                                        ['value' => 'tag', 'title' => 'Title']
                                    ])
                                    // Переопределение текущей локали
                                    ->locale('ru')
                                    ->hideOnIndex(),
                            ]),
                            Tab::make('SEO', [
                                Text::make('Seo title')
                                    ->sortable(),
                            ])
                        ]),

                    ])
                ])->columnSpan(7),
                Column::make([
                    Block::make('Дополнительная информация', [
                        MediaLibrary::make('Изображение', 'sm_image')
                            ->removable()
                            ->multiple()
                            ->dir('articles'),
                        BelongsTo::make('Категоия', 'category_id', 'name')
                            ->searchable()
                            ->sortable(),
                        BelongsTo::make('Автор', 'user_id', 'name')
                            ->searchable()
                            ->sortable(),
                        SwitchBoolean::make('Опубликовать', 'status',
                            fn($item) => $item->status === 'PABLIC' ? $item->status = 'PUBLIC' : $item->status = 'PENDING'),
                        Text::make('статус', 'status'),
                        Date::make('Дата создания', 'created_at')
                            ->format('d.m.Y')
                            ->sortable(),
                        Date::make('Дата обновления', 'updated_at')
                            ->format('d.m.Y')
                            ->sortable()
                    ])
                ])->columnSpan(5)
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
