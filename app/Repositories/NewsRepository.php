<?php

namespace App\Repositories;

use App\Contracts\NewsRepositoryInterface;
use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;


class NewsRepository implements NewsRepositoryInterface
{

    /**
     * @return Builder
     */
    public function getAll(): Builder
    {
        return News::with('category')
            ->orderBy('created_at', 'DESC');
    }


    /**
     * @param $id
     * @return object
     */
    public function getOne($id): object
    {
        return News::with('category')->findOrFail($id);
    }

    public function getOrCreateByParser(array $data): void
    {
        News::firstOrCreate([
            'category_id' => $data['category_id'],
            'source_id' => $data['source_id'],
            'title' => $data['title'],
            'excerpt' => $data['excerpt'],
            'body' => $data['body'],
            'image' => $data['image'],
            'status' => 'PUBLISHED',
        ]);
    }
}
