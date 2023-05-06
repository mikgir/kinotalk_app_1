<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @param ArticleRepository $repository
     * @return View
     */
    public function index(ArticleRepository $repository): View
    {
        return view('articles.index', [
            'articles' => $repository->getAll()->partition(5)
        ]);
    }

    /**
     * @return View
     */
    public function show(): View
    {
        return view('articles.show');
    }
}
