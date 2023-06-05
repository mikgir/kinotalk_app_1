<?php

namespace App\Repositories;

use App\Contracts\SearchRepositoryInterface;
use App\Models\Article;
use App\Models\News;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class SearchRepository implements SearchRepositoryInterface
{
    /**
     * @param $search
     * @return Collection|LengthAwarePaginator
     */
    public function getAllBySearch($search): Collection|LengthAwarePaginator
    {
        $news = News::select('id', 'title', 'created_at',
            DB::raw('"news" AS type, "Новость" AS name'))
            ->where('active', '1')
            ->where('status', 'PUBLISHED')
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });

        return Article::select('id', 'title', 'created_at',
            DB::raw('"articles" AS type, "Статья" AS name'))
            ->where('active', '1')
            ->where('status', 'PUBLISHED')
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            })
            ->union($news)->latest()->limit(10)->get();
    }
    
}
