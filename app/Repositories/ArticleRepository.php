<?php

namespace App\Repositories;

use App\Contracts\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository implements ArticleRepositoryInterface
{

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
       return Article::with('user')->get();
    }

    /**
     * @param $id
     * @return object
     */
    public function getOne($id): object
    {
        return Article::with('user')->firstOrFail($id);
    }
}
