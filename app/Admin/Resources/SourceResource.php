<?php

namespace App\Admin\Resources;

use App\Models\Source;
use App\MoonShine\Actions\ParserAction;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Fields\Url;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class SourceResource extends Resource
{
    public static string $model = Source::class;
    public static string $title = 'Ресурсы';
    public static string $subTitle = 'Управление ресурсами';
    public string $titleField = 'title';
    public static int $itemsPerPage = 5;



    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Grid::make([
                Column::make([
                    Block::make('Информация', [
                        Text::make('Имя', 'name'),
                        Url::make('Url', 'url'),
                        Text::make('Статус', 'status'),
                        Date::make('Дата создания', 'created_at')->sortable(),
                        Date::make('Дата изменения', 'updated_at')->sortable()
                    ])
                ])
            ])
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'name'    => ['required', 'string', 'min:3', 'max:30'],
            'url'     => ['required', 'url'],
            'status'  => ['required', 'string', 'min:6', 'max:8'],
        ];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
            ParserAction::make('Получить новости'),
        ];
    }
}
