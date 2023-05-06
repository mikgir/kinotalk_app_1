<?php

namespace App\Repositories;

use App\Contracts\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository implements ArticleRepositoryInterface
{

    /**
     * @return Collection|array
     */
    public function getAll(): Collection|array
    {
       return Article::with('user')->get();
    }

    public function getOne()
    {
        // TODO: Implement getOne() method.
    }
}
