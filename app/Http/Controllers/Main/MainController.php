<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use App\Repositories\AuthorRepository;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    /**
     * @param ArticleRepository $articleRepository
     * @param AuthorRepository $authorRepository
     * @return View
     */
    public function index(ArticleRepository $articleRepository, AuthorRepository $authorRepository): View
    {
        $mainArticles = $articleRepository->getLast();
        $popularArticles = $articleRepository->getPopular();
        $authors = $authorRepository->getAuthorsForMain();

        return view('main.index', [
            'mainArticles' => $mainArticles,
            'popularArticles' => $popularArticles,
            'authors' => $authors
        ]);
    }
}
