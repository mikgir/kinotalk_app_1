<?php

namespace App\Admin\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class CommentResource extends Resource
{
	public static string $model = Comment::class;

	public static string $title = 'Комментарии';

    public static string $subTitle = 'Список комментариев';
    public string $titleField = 'title';
    public static array $with = [
        'user',
        'article'
    ];
    public static int $itemsPerPage = 5;

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Grid::make([
                Column::make([
                    Block::make('Информация статья и автор', [
                        BelongsTo::make('User')
                            ->searchable()
                            ->sortable(),
                        BelongsTo::make('Article')
                            ->searchable()
                            ->sortable()
                    ])
                ])->columnSpan(5),
                Column::make([
                    Block::make('Основная информация', [
                        Text::make('Text')
                            ->hideOnIndex(),
                        Text::make('Status'),
                        Date::make('Дата создания', 'created_at')
                            ->sortable(),
                        Date::make('Дата изменения', 'updated_at')
                            ->sortable()
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
        return ['id', 'user'];
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