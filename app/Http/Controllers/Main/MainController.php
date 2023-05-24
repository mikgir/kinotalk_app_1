<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    /**
     * @param ArticleRepository $articleRepository
     * @return View
     */
    public function index(ArticleRepository $articleRepository): View
    {
        $mainArticle = $articleRepository->getLast();

        return view('main.index', [
            'mainArticle' => $mainArticle,
        ]);
    }
}
