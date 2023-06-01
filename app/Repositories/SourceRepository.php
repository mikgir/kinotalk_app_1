<?php

namespace App\Repositories;

use App\Contracts\ArticleRepositoryInterface;
use App\Contracts\SourceRepositoryInterface;
use App\Models\Article;
use App\Models\Category;
use App\Models\Source;
use Illuminate\Database\Eloquent\Collection;

class SourceRepository implements SourceRepositoryInterface
{
    public function getAll()
    {
        return Source::all();
    }

    /**
     * @param string $name
     * @return int
     */
    public function getSourceIdByName(string $name): int
    {
        return Source::where('name', $name)->value('id');
    }
}
