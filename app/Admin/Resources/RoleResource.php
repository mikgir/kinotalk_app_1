<?php

namespace App\Admin\Resources;

use Illuminate\Database\Eloquent\Model;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\BelongsToMany;
use MoonShine\Fields\Text;
use Spatie\Permission\Models\Role;

use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class RoleResource extends Resource
{
	public static string $model = Role::class;

	public static string $title = 'Роли';
    public static string $subTitle = 'Управление ролями';
    public string $titleField = 'name';
    public static int $itemsPerPage = 5;
    protected bool $editInModal = true;
    protected bool $createInModal = true;
    public static array $with = [
        'permissions'
    ];

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Grid::make([
                Column::make('Данные', [
                    Block::make('Введите данные', [
                        Text::make('Наименование', 'name'),
                        Text::make('guard_name'),
                        ])

                ])->columnSpan(5),
                Column::make('Роли', [
                    Block::make('Выберете разрешения', [
                        BelongsToMany::make('Разрешения', 'permissions', 'name')
                            ->hideOnIndex()
                    ])
                ])->columnSpan(7)
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
