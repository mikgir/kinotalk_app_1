<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use Illuminate\View\View;

class NewsController extends Controller
{
    public $newsRepository;
    public $categoryRepository;

    public function __construct(NewsRepository     $newsRepository,
                                CategoryRepository $categoryRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->categoryRepository = $categoryRepository;
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
     * @param $id
     * @return View
     */
    public function show($id): View
    {
        $news = $this->newsRepository->getOne($id);
        return view('news.show', compact('news'));
    }
}
