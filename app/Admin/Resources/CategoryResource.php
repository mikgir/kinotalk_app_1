<?php

namespace App\Admin\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;

class CategoryResource extends Resource
{
	public static string $model = Category::class;
	public static string $title = 'Категории';
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
                        MediaLibrary::make('Обложка', 'cover'),
                        Text::make('Наименование', 'name')->sortable(),
                        Date::make('Дата создания', 'created_at')->sortable(),
                        Date::make('Дата изменения', 'updated_at')->sortable()
                    ])
                ])
            ])
        ];
	}

	public function rules(Model $item): array
	{
	    return [];
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
