<?php

namespace App\Repositories;

use App\Contracts\CategoryRepositoryInterface;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository implements CategoryRepositoryInterface
{

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Category::all();
    }

    /**
     * @param $id
     * @return Model|Builder
     */
    public function getOne($id): Model|Builder
    {
        return Category::with('articles')
            ->firstOrFail($id);
    }

    /**
     * @return Collection
     */
    public function getAllWithArticles(): Collection
    {
        return Category::with('articles')->get();
    }

    /**
     * @return LengthAwarePaginator|Collection
     */
    public function getAllWithNews(): LengthAwarePaginator|Collection
    {
        return Category::with('news')->paginate(0);
    }

    public function getCategoryIdByName(string $name): int
    {
        $categry = Category::firstOrCreate(['name' => $name]);
        return $categry->id;
    }
}
