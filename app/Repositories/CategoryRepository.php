<?php

namespace App\Repositories;

use App\Contracts\CategoryRepositoryInterface;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
       return Article::with('user')->get();
    }

    public function getOne()
    {
        // TODO: Implement getOne() method.
    }

    public function getCategoryIdByName(string $name): int
    {
        $categry = Category::firstOrCreate(['name' => $name]);
        return $categry->id;
    }
}
