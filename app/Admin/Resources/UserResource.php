<?php

namespace App\Admin\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use Illuminate\Contracts\Database\Eloquent\Builder;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\BelongsToMany;
use MoonShine\Fields\Date;
use MoonShine\Fields\Email;
use MoonShine\Fields\HasMany;
use MoonShine\Fields\HasOne;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Filters\DateFilter;
use MoonShine\Filters\TextFilter;
use MoonShine\ItemActions\ItemAction;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;
use Spatie\Permission\Traits\HasRoles;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;

class UserResource extends Resource
{
    use HasRoles;

    public static string $model = User::class;
    public static string $title = 'Пользователи';
    public static string $subTitle = 'Управление пользователями';
    public string $titleField = 'name';
    public static int $itemsPerPage = 5;

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return User::with([
            'roles',
            'permissions',
            'profile',
            'socialLinks',
            'media',
        ]);
    }

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Grid::make([
                Column::make([
                    Block::make('Информация', [
                        MediaLibrary::make('Аватар', 'avatars')
                            ->removable(),
                        Text::make('Имя', 'name'),
                        Email::make('email'),
//                        Password::make('Пароль', 'password')
//                            ->hideOnIndex(),
                        Date::make('Дата регистрации', 'created_at')
                            ->sortable(),
                        HasOne::make('Профиль', 'profile')
                            ->fields([
                                Text::make('Имя', 'first_name'),
                                Text::make('Фамилия', 'last_name'),
                                Date::make('Дата рождения', 'birthday'),
                                Text::make('Город', 'city'),
                                Text::make('Страна', 'country'),
                                Textarea::make('Обо мне', 'about_me'),
                            ])->resourceMode()
                            ->hideOnIndex(),
                        HasMany::make('Ссылки на соц.сети', 'SocialLinks')
                            ->removable()
                            ->hideOnIndex(),
                        BelongsToMany::make('Роль', 'roles', new RoleResource())
                            ->sortable(),
                        Select::make('Статус пользователя', 'active')
                            ->options([
                                1 => 'Активный пользователь',
                                0 => 'Удаленный пользователь'
                            ])
                            ->hideOnIndex(),
                    ])

                ])->columnSpan(12),

            ])
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string']
        ];
    }

    public function search(): array
    {
        return ['id', 'name'];
    }

    public function filters(): array
    {
        return [
            TextFilter::make('Имя', 'name'),
            TextFilter::make('Email'),
            DateFilter::make('Дата', 'created_at'),
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
        if ($item->active === 0 ){
            return 'red';
        }

        return parent::trClass($item, $index);
    }

    public function itemActions(): array
    {
        return [
            ItemAction::make('User', function (Model $item){
                $item->assignRole('user');
            }, 'Роль user')
                ->withConfirm(),
            ItemAction::make('Блок +', function (Model $item) {
                $item->update(['active' => false]);
            }, 'Заблокирован')
                ->withConfirm()
                ->icon('heroicons.outline.user-minus'),
            ItemAction::make('Блок -', function (Model $item) {
                $item->update(['active' => true]);
            }, 'Разблокирован')
                ->withConfirm()
                ->icon('heroicons.user-plus'),
            ItemAction::make('Автор +', function (Model $item) {
                if ($item->hasRole(['user', 'moderator'])) {
                    $item->assignRole(['user', 'moderator', 'author']);
                }
                $item->assignRole(['user', 'author']);
            }, 'Зарегистрирован автором')
                ->withConfirm()
                ->icon('heroicons.pencil-square'),
            ItemAction::make('Автор -', function (Model $item) {
                $item->removeRole('author');
            }, 'Автор удален')
                ->withConfirm()
                ->icon('heroicons.outline.pencil-square'),
            ItemAction::make('Модератор +', function (Model $item) {
                if ($item->hasRole(['user', 'author'])) {
                    $item->assignRole(['user', 'moderator', 'author']);
                }
                $item->assignRole(['user', 'moderator']);
            }, 'Зарегистрирован модератором')
                ->withConfirm()
                ->icon('heroicons.academic-cap'),
            ItemAction::make('Модератор -', function (Model $item) {
                $item->removeRole('moderator');
            }, 'Модератор удален')
                ->withConfirm()
                ->icon('heroicons.outline.academic-cap'),
        ];
    }
}
