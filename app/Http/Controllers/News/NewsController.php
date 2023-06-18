<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use Illuminate\View\View;

class NewsController extends Controller
{
    public $newsRepository;

    public function __construct(NewsRepository     $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $news = $this->newsRepository->getAll();
        return view('news.index', compact('news'));
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $news = $this->newsRepository->getOne($id);

        $previousNews = $this->newsRepository->getPreviousNews($id);

        $nextNews = $this->newsRepository->getNextNews($id);

        return view('news.show', [
            'news' => $news,
            'previousNews' => $previousNews,
            'nextNews' => $nextNews,
        ]);
    }
}
