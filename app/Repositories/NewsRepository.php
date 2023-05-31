<?php

namespace App\Repositories;

use App\Contracts\NewsRepositoryInterface;
use App\Models\News;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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
     * @param int $id
     * @return News
     */
    public function getOne(int $id): News
    {
        return News::findOrFail($id);
    }

    /**
     * @param array $data
     * @return void
     */
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

    /**
     * @param int $id
     * @return Collection
     */
    public function getAllBySourceId(int $id): Collection
    {
        return News::where('source_id', $id)->get();
    }
}
