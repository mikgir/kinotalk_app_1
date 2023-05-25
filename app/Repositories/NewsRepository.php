<?php

namespace App\Repositories;

use App\Contracts\NewsRepositoryInterface;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;


class NewsRepository implements NewsRepositoryInterface
{

    /**
     * @return LengthAwarePaginator|Collection
     */
    public function getAll(): LengthAwarePaginator| Collection
    {
        return News::orderByDesc('created_at')->paginate(12);
    }


    /**
     * @param $id
     * @return object
     */
    public function getOne($id): object
    {
        return News::findOrFail($id);
    }

    public function getOrCreateByParser(array $data): void
    {
        News::firstOrCreate([
            'source_id' => $data['source_id'],
            'title' => $data['title'],
            'excerpt' => $data['excerpt'],
            'body' => $data['body'],
            'image' => $data['image'],
            'status' => 'PUBLISHED',
        ]);
    }
}
