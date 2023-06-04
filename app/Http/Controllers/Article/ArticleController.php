<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Date;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;


class ArticleController extends Controller
{
    protected $articleRepository;
    protected $categoryRepository;

    public function __construct(ArticleRepository $articleRepository, CategoryRepository $categoryRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $categories = $this->categoryRepository->getAll();
        $articles = $this->articleRepository->getAll();

        return view('articles.index', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }

    /**
     * @param $id
     * @return View
     */
    public function show($id): View
    {
        $article = $this->articleRepository->getOne($id);
        return view('articles.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param ArticleRequest $request
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(ArticleRequest $request): RedirectResponse
    {
        $this->articleRepository->createArticle($request);

        return redirect('/profile')
            ->with('success', 'Статья успешно создана');
    }

    /**
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function publish($id): Application|Redirector|RedirectResponse
    {
        $article = Article::with('user')->findOrFail($id);
        $article->update(['status' => 'PENDING']);

        return redirect('/profile')
            ->with('success', 'Статья успешно обновлена');
    }


    /**
     * Show the form for editing the specified resource.
     * @param string $id
     * @return Factory|Application|View
     */
    public function edit(string $id): Factory|Application|View
    {
        $article = Article::with(['user', 'category'])->findOrFail($id);
        $categories = Category::all();

        return \view('articles.edit', [
            'article'=>$article,
            'categories'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param ArticleRequest $request
     * @param string $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(ArticleRequest $request, string $id): Application|Redirector|RedirectResponse
    {
        $this->articleRepository->updateArticle($id,$request);

        return redirect('/profile')
            ->with('success', 'Статья успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $article = $this->articleRepository->getOne($id);
        $article->delete();

        return redirect('/profile')
            ->with('success', 'Статья успешно удалена');

    }
}
