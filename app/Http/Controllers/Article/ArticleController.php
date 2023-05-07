<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use Illuminate\Contracts\View\View;


class ArticleController extends Controller
{
    protected $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $articles = $this->repository->getAll()->partition(5);

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    /**
     * @param $id
     * @return View
     */
    public function show($id): View
    {
        $article = $this->repository->getOne($id);

        return view('articles.show', [
            'article' => $article
        ]);
    }
}
