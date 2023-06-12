<?php

namespace App\Admin\Resources;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\Date;
use MoonShine\Fields\Email;
use MoonShine\Fields\HasOne;
use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;

class ProfileResource extends Resource
{
    public static string $model = Profile::class;
    public static string $title = 'Профиль';
    public static string $subTitle = 'Информация о пользователях';
    public string $titleField = 'last_name';
    public static int $itemsPerPage = 2;
    protected bool $editInModal = true;
    protected bool $createInModal = true;

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Grid::make([
                Column::make([
                    Block::make('Содержание', [
                        HasOne::make('user', 'user_id')->fields([
                            MediaLibrary::make('Аватар', 'avatars'),
                            Text::make('Имя', 'name'),
                            Email::make('email'),
                        ]),
                        Text::make('Имя', 'first_name'),
                        Text::make('Фамилия', 'last_name'),
                        Date::make('Дата рождения', 'birthday'),
                        Text::make('Город', 'city'),
                        Text::make('Страна', 'country'),
                        Text::make('Вэб сайт', 'website')
                            ->hideOnIndex(),
                        Text::make('Обо мне', 'about_me')
                            ->hideOnIndex(),
                        Date::make('Дата создания', 'created_at')
                            ->format('d.m.Y')
                            ->hideOnIndex(),
                        Date::make('Дата обновления', 'updated_at')
                            ->format('d.m.Y')
                            ->sortable()
                    ])
                ])->columnSpan(6)
            ]),
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
