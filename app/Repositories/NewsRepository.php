<?php

namespace App\Repositories;

use App\Contracts\NewsRepositoryInterface;
use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;


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
     * @param News $news
     * @return Builder
     */
    public function getOne(News $news): Builder
    {
        return News::with('category')
            ->firstOrFail($news);
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
