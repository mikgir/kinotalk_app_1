<?php

namespace App\Admin\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\SocialType;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\Url;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class SocialTypeResource extends Resource
{
	public static string $model = SocialType::class;
	public static string $title = 'Категории социальных сетей';
    public static string $subTitle = 'Управление категориями';
    public string $titleField = 'title';
    public static int $itemsPerPage = 5;
    protected bool $editInModal = true;
    protected bool $createInModal = true;

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Grid::make([
                Column::make([
                    Block::make('Информация', [
                        BelongsTo::make('Пользователь', 'user_id', 'name')
                            ->sortable()
                            ->searchable(),
                        BelongsTo::make('Соц.сеть', 'social_type_id', 'name')
                            ->searchable(),
                        Url::make('Ссылка', 'link'),
                    ])
                ])->columnSpan(6),
            ])
        ];
	}

	public function rules(Model $item): array
	{
	    return [
            'name'=>'required|string|max:50',
        ];
    }

    public function search(): array
    {
        return ['id', 'name', 'icon_name'];
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
