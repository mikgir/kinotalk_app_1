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
        return Article::with(['category', 'user'])->paginate(5);
    }

    public function getLast()
    {
        return Article::last()->getFirstMedia('image')->getPath();
    }

    /**
     * @param $id
     * @return object
     */
    public function getOne($id): object
    {
        return Article::with(['category', 'user'])->findOrFail($id);
    }

    public function createArticle(Request $request)
    {

    }

}
