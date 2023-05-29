<?php

namespace App\Admin\Resources;

use App\Models\User;
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
use MoonShine\Fields\Email;
use MoonShine\Fields\Enum;
use MoonShine\Fields\HasMany;
use MoonShine\Fields\Image;
use MoonShine\Fields\MorphMany;
use MoonShine\Fields\NoInput;
use MoonShine\Fields\Number;
use MoonShine\Fields\Password;
use MoonShine\Fields\Select;
use MoonShine\Fields\Slug;
use MoonShine\Fields\SwitchBoolean;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\ItemActions\ItemAction;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;
use Spatie\Permission\Traits\HasRoles;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;

class RequestBecomeAuthorResource extends Resource
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
            'media',
            'comments'
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
                        Password::make('Пароль', 'password')
                            ->hideOnIndex(),
                        Date::make('Дата регистрации', 'created_at')
                            ->sortable(),
                        MorphMany::make('Роль', 'roles')
                            ->sortable()
                            ->removable()
                    ])
                ])->columnSpan(6),
                HasMany::make('Comments')
                    ->hideOnIndex()
                    ->resourceMode()
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
        return ['name', 'roles'];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
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
                    $item->syncRoles(['user', 'moderator', 'author']);
                }
                $item->syncRoles(['user', 'author']);
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
                    $item->syncRoles(['user', 'moderator', 'author']);
                }
                $item->syncRoles(['user', 'moderator']);
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
