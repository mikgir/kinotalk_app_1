<?php

namespace App\Repositories;

use App\Contracts\CommentRepositoryInterface;
use App\Models\Comment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CommentRepository implements CommentRepositoryInterface
{

    /**
     * @param int $id
     * @return Collection|LengthAwarePaginator
     */
    public function getAllByArticleId($id): Collection|LengthAwarePaginator
    {
        return Comment::with(['user'])
            ->where('article_id', $id)
            ->orderByDesc('created_at')
            ->paginate(10);
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
