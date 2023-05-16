<?php

namespace App\Admin\Resources;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use Illuminate\Contracts\Database\Eloquent\Builder;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Date;
use MoonShine\Fields\Email;
use MoonShine\Fields\HasOne;
use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;

class UserResource extends Resource
{
    public static string $model = User::class;
    public static string $title = 'Пользователи';
    public static string $subTitle = 'Управление пользователями';
    public string $titleField = 'title';
    public static int $itemsPerPage = 5;
    protected bool $editInModal = true;
    protected bool $createInModal = true;

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return User::with(['roles', 'profile']);
    }
    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Grid::make([
                Column::make([
                    Block::make('Информация', [
                        MediaLibrary::make('Аватар', 'avatars'),
                        Text::make('Имя', 'name'),
                        Email::make('email'),
                        Date::make('Дата регистрации', 'created_at'),
                        HasOne::make('Роль', 'roles')
                            ->sortable()
                    ])
                ])->columnSpan(6),
//                Column::make([
//                    Block::make('Профиль', [
//                        HasOne::make('Профиль', 'profile')
//                    ])
//                ])->columnSpan(6)
            ])
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'name'=>['required', 'string'],
            'email'=>['required', 'string']
        ];
    }

    public function search(): array
    {
        return ['id', 'name'];
    }

    public function filters(): array
    {
        return ['name', 'roles'];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
