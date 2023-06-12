<?php

namespace App\Repositories;

use App\Contracts\ArticleRepositoryInterface;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Date;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class ArticleRepository implements ArticleRepositoryInterface
{
    use InteractsWithMedia;


    /**
     * @return Collection|LengthAwarePaginator
     */
    public function getAll(): Collection|LengthAwarePaginator
    {
        return Article::with(['category', 'user'])
            ->where('active', 1)
            ->paginate(5);
    }

    /**
     * @return Collection
     */
    public function getLast(): Collection
    {
        return Article::with(['user', 'category', 'media'])
            ->where('active', 1)
            ->latest('created_at')
            ->limit(3)->get();
    }

    /**
     * @return Builder|Collection
     */
    public function getPopular(): Builder|Collection
    {
        return Article::with(['user', 'category', 'media', 'comments'])
            ->where('status', 'PUBLISHED')
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->get();
    }

    /**
     * @param $id
     * @return Collection
     */
    public function getOne($id): Collection
    {
        return Article::with(['category', 'user', 'comments'])->findOrFail($id);
    }

    /**
     * @param ArticleRequest $request
     * @return void
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function createArticle(ArticleRequest $request): void
    {
        $article = new Article;

        $article->user_id = auth()->id();
        $article->category_id = $request->category;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->status = "DRAFT";
        $article->active = false;

        if ($request->hasFile('image')) {
            $article->addMediaFromRequest('image')
                ->toMediaCollection('sm_image');
        }

        $article->save();

    }

    /**
     * @param $id
     * @param ArticleRequest $request
     * @return void
     */
    public function updateArticle($id, ArticleRequest $request): void
    {
        $article = Article::with(['user', 'category'])->findOrFail($id);

        $article->update([
            'category_id' => $request->category,
            'title' => $request->title,
            'body' => $request->body,
            'status' => "DRAFT",
            'active' => false
        ]);

        if ($request->hasFile('image')) {
            $media = $article->getMedia('sm_image')->first();

            if ($media){
                $article->clearMediaCollection('sm_image');
            }

            $article->addMediaFromRequest('image')
                ->toMediaCollection('sm_image');
        }

    }

}
