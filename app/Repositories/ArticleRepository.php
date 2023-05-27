<?php

namespace App\Repositories;

use App\Contracts\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ArticleRepository implements ArticleRepositoryInterface
{

    /**
     * @return Collection|LengthAwarePaginator
     */
    public function getAll(): Collection|LengthAwarePaginator
    {
        return Article::with(['category', 'user'])
            ->where('category_id', '=', 'categories.id')
            ->paginate(3);
    }

    /**
     * @return Collection
     */
    public function getLast(): Collection
    {
        return Article::with(['user', 'category', 'media'])
            ->latest('created_at')
            ->limit(1)->get();
    }

    /**
     * @param $id
     * @return object
     */
    public function getOne($id): object
    {
        return Article::with(['category', 'user', 'comments'])->findOrFail($id);
    }

    public function createArticle(Request $request)
    {

    }

}
