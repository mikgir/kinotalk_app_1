<?php

namespace App\Repositories;

use App\Contracts\CommentRepositoryInterface;
use App\Models\Comment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CommentRepository implements CommentRepositoryInterface
{
    /**
     * @param $model
     * @return Collection|LengthAwarePaginator
     */
    public function getAllByModel($model): Collection|LengthAwarePaginator
    {
        return $model
            ->comments()
            ->with('user', 'children')
            ->withCount('children')
            ->whereNull('parent_id')
            ->latest()
            ->paginate(5);
    }

    /**
     * @param int $id
     * @return object
     */
    public function getOne($id): object
    {
        return Comment::with(['user'])->findOrFail($id);
    }
}
