<?php

namespace App\Repositories;

use App\Contracts\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository implements CategoryRepositoryInterface
{

    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator
    {
        return Category::with(['articles' => function($query) {
            $query->where('status', 'PUBLISHED')
                ->where('active', 1)
                ->orderBy('created_at', 'desc');
        }])->paginate(1);
    }

    /**
     * @return Collection
     */
    public function getHeaderAll(): Collection
    {
        return Category::with(['articles' => function($query) {
            $query->where('status', 'PUBLISHED')
                ->where('active', 1)
                ->orderBy('created_at', 'desc');
        }])->get();
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
