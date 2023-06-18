<?php

namespace App\Repositories;

use App\Contracts\ArticleRepositoryInterface;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
            ->where('status', 'PUBLISHED')
            ->where('active', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    }

    /**
     * @return Collection
     */
    public function getLast(): Collection
    {
        return Article::with(['user', 'category', 'media'])
            ->where('status', 'PUBLISHED')
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
     * @return object
     */
    public function getOne($id): object
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

    /**
     * @param int $id
     * @param int $categoryId
     * @return mixed
     */
    public function getPreviousArticle(int $id): mixed
    {
        $categoryId = $this->getOne($id)->category->id;

        $articlesByCategory = $this->getArticlesByCategory($categoryId);

        //проверяем, если ли предыдущая статья
        $article = $articlesByCategory->where('id', '<', $id)->sortByDesc('id')->first();

        if(!$article){
            //если статья не найдена (например id=1), наоборот, берем самую последнюю
            $article = $articlesByCategory->where('id', '>', $id)->sortByDesc('id')->first();

            if(!$article){
                //если статей в категории всего одна, то возвращаем ее
                $article = $this->getOne($id);
            }
        }
        return $article;
    }

    /**
     * @param int $id
     * @param int $categoryId
     * @return mixed
     */
    public function getNextArticle(int $id): mixed
    {
        $categoryId = $this->getOne($id)->category->id;

        $articlesByCategory = $this->getArticlesByCategory($categoryId);

        //проверяем, если ли следующая статья
        $article = $articlesByCategory->where('id', '>', $id)->sortByDesc('id')->last();

        if(!$article){
            //если статья не найдена (например id=1), наоборот, берем самую последнюю
            $article = $articlesByCategory->where('id', '<', $id)->sortByDesc('id')->last();

            if(!$article){
                //если статей в категории всего одна, то возвращаем ее
                $article = $this->getOne($id);
            }
        }
        return $article;
    }

    /**
     * @param int $categoryId
     * @return Builder[]|Collection
     */
    public function getArticlesByCategory(int $categoryId): Builder|Collection
    {
        return Article::with(['user', 'category', 'media'])
            ->where('category_id', $categoryId)
            ->where('status', 'PUBLISHED')
            ->where('active', 1)
            ->get();
    }
}
