<?php

namespace App\Admin\Resources;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\SocialLink;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Fields\Url;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class SocialLinkResource extends Resource
{
	public static string $model = SocialLink::class;

	public static string $title = 'Социальные сети';
    public static string $subTitle = 'Страницы соц-сетей пользователей';
    public static int $itemsPerPage = 5;


    public function query(): Builder
    {
        return SocialLink::with([
            'user',
            'socialType'
        ]);
    }
	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Grid::make([
                Block::make('Информация', [
                    BelongsTo::make('Пользователь', 'user_id', 'name')
                        ->sortable()
                        ->searchable(),
                    BelongsTo::make('Соц-сеть', 'social_type_id', 'name')
                        ->searchable(),
                    Url::make('Ссылка', 'link')
                ])
            ])
        ];
	}

	public function rules(Model $item): array
	{
	    return [
            'link'=>['required','url', 'max:255']
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
        ];
    }
}
