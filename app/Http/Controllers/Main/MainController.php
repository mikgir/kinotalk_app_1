<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use App\Repositories\AuthorRepository;
use App\Repositories\NewsRepository;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    /**
     * @param ArticleRepository $articleRepository
     * @param AuthorRepository $authorRepository
     * @param NewsRepository $newsRepository
     * @return View
     */
    public function index(ArticleRepository $articleRepository,
                          AuthorRepository  $authorRepository,
                          NewsRepository    $newsRepository): View
    {
        $mainArticles = $articleRepository->getLast();
        $popularArticles = $articleRepository->getPopular();
        $authors = $authorRepository->getAuthorsForMain();
        $lastNews = $newsRepository->getLast();
        $popularNews = $newsRepository->getPopular();


        return view('main.index', [
            'mainArticles' => $mainArticles,
            'popularArticles' => $popularArticles,
            'authors' => $authors,
            'lastNews' => $lastNews,
            'popularNews' => $popularNews
        ]);
    }
}
