<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;



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
     * @param Request $request
     * @param ArticleRequest $articleRequest
     * @return RedirectResponse
     */
    public function store(Request $request, ArticleRequest $articleRequest): RedirectResponse
    {
        $request->validate($articleRequest->rules());

        $article = Article::create([
            'user_id' => auth('web')->id(),
            'category_id' => $request->category,
            'title' => $request->title,
            'body' => $request->body,
            'seo_title' => $request->title,
            'excerpt' => substr($request->body, 0, 100) . '...',
            'status' => "DRAFT",
            'featured' => false,
            'active' => false,
            'created_at' => Date::now('EU/Moscow')
        ]);

        if ($request->hasFile('image')) {
            $article->addMediaFromRequest('image')
                ->toMediaCollection('sm_image');
        }

        return redirect('profile.show', auth('web')->id())
            ->with('success', 'Статья успешно сохранена');
    }

    /**
     * @param $id
     * @return void
     */
    public function publish($id): void
    {
        $article = Article::with('user')->findOrFail($id);
        $article->update(['status' => 'PENDING']);
    }


    /**
     * Show the form for editing the specified resource.
     * @param string $id
     * @return Factory|Application|View
     */
    public function edit(string $id): Factory|Application|View
    {
        $article = Article::with(['user', 'category'])->findOrFail($id);

        return \view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
