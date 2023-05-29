<?php

namespace App\Repositories;

use App\Contracts\ArticleRepositoryInterface;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ArticleRepository implements ArticleRepositoryInterface
{

    /**
     * @return Collection|LengthAwarePaginator
     */
    public function getAll(): Collection|LengthAwarePaginator
    {
        return Article::with(['category', 'user'])
            ->where('category_id', '=', 'categories.id')
            ->paginate(3);
    }

    /**
     * @return Collection
     */
    public function getLast(): Collection
    {
        return Article::with(['user', 'category', 'media'])
            ->latest('created_at')
            ->limit(1)->get();
    }

    /**
     * @param $id
     * @return object
     */
    public function getOne($id): object
    {
        return Article::with(['category', 'user', 'comments'])->findOrFail($id);
    }

    /**
     * @param ArticleRequest $request
     * @return object
     */
    public function createArticle(ArticleRequest $request): object
    {
//        $article = Article::create($request->validated([
//            'user_id' => auth()->id(),
//            'category_id' => $request->category,
//            'title' => $request->title,
//            'body' => $request->body,
//            'seo_title' => $request->title,
//            'excerpt' => substr($request->body, 0, 100) . '...',
//            'status' => "DRAFT",
//            'featured' => false,
//            'active' => false,
//            'created_at'=>Date::now('EU/Moscow')
//
//        ]));
//
//        if ($request->hasFile('image')) {
//            $article->addMediaFromRequest('image')
//                ->toMediaCollection('sm_image');
//        }
//        return $article;
    }

}
