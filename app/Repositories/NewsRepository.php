<?php

namespace App\Repositories;

use App\Contracts\ArticleRepositoryInterface;
use App\Models\Article;
use App\Models\News;
use Illuminate\Database\Eloquent\Collection;

class NewsRepository implements ArticleRepositoryInterface
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
