<?php

namespace App\Admin\Resources;

use App\Enum\ArticleStatusEnum;
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
use MoonShine\Fields\Enum;
use MoonShine\Fields\HasMany;
use MoonShine\Fields\Image;
use MoonShine\Fields\NoInput;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select;
use MoonShine\Fields\Slug;
use MoonShine\Fields\SwitchBoolean;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Filters\BelongsToFilter;
use MoonShine\Filters\DateFilter;
use MoonShine\Filters\SwitchBooleanFilter;
use MoonShine\Filters\TextFilter;
use MoonShine\ItemActions\ItemAction;
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
        'category',
        'comments'
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
                                Text::make('Заголовок', 'title')
                                    ->sortable(),
                                Slug::make('Slug')
                                    ->from('title')
                                    ->separator('-')
                                    ->unique()
                                    ->hideOnIndex(),
                            ]),
                        ]),
                        Tabs::make([
                            Tab::make('Описание', [
                                TinyMce::make('Описание', 'body')
                                    // Переопределить набор плагинов
                                    ->plugins('anchor autoresize image link fullscreen preview visualblocks')
                                    // Переопределить набор toolbar
                                    ->toolbar('undo redo | blocks fontfamily fontsize | link image media | fullscreen preview visualblocks')
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
                                    ->hideOnIndex(),
                            ])
                        ]),
                    ]),
                ])->columnSpan(7),
                Column::make([
                    Block::make('Дополнительная информация', [
                        MediaLibrary::make('Изображение', 'sm_image')
                            ->removable()
                            ->multiple(),
                        BelongsTo::make('Категоия', 'category_id', 'name')
                            ->searchable()
                            ->sortable(),
                        BelongsTo::make('Автор', 'user_id', 'name')
                            ->searchable()
                            ->sortable(),
                        Number::make('Рейтинг', 'love_reactant_id')
                            ->stars(),
                        SwitchBoolean::make('Active'),
                        Enum::make('Статус', 'status')->attach(ArticleStatusEnum::class),
                        Date::make('Дата создания', 'created_at')
                            ->format('d.m.Y')
                            ->sortable(),
                        Date::make('Дата обновления', 'updated_at')
                            ->format('d.m.Y')
                            ->sortable()
                            ->hideOnIndex()
                    ])
                ])
                    ->columnSpan(5),
            ]),
            Block::make('Комментарии', [
                HasMany::make('Комментарии', 'comments')
                    ->hideOnIndex()
                    ->resourceMode(),
            ])
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
        return [
            TextFilter::make('Заголовок', 'title'),
            BelongsToFilter::make('Автор', 'user', 'name')
                ->nullable()
                ->searchable(),
            DateFilter::make('Дата', 'created_at'),
            SwitchBooleanFilter::make("Active")
        ];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }

   public function trClass(Model $item, int $index): string
   {
       if ($item->status === ArticleStatusEnum::DRAFT ){
           return 'yellow';
       }
       if ($item->status === ArticleStatusEnum::PENDING ){
           return 'blue';
       }
       if ($item->status === ArticleStatusEnum::PUBLISHED  ){
           return 'green';
       }
       if ($item->active == false ){
           return 'red';
       }

       return parent::trClass($item, $index);
   }

    public function itemActions(): array
    {
        return [
            ItemAction::make('Опубликовать', function (Model $item){
                $item->update(['status'=>'PUBLISHED']);
                $item->update(['active'=> true]);
            }, 'Опубликовано')
                ->withConfirm()
                ->icon('heroicons.signal'),
            ItemAction::make('Ожидание', function (Model $item){
                $item->update(['status'=>'PENDING']);
                $item->update(['active'=>false]);
            }, 'В ожидании')
                ->withConfirm()
                ->icon('heroicons.signal-slash'),

        ];
    }
}
