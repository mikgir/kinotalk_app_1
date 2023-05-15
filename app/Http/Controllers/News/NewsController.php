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

    public function __construct(NewsRepository $newsRepository,
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
        $categories = $this->categoryRepository->getAllWithNews();

        return view('news.index', compact('categories'));
    }

    public function show(News $news): View
    {
        $news=$this->newsRepository->getOne($news);
        return view('news.show', compact('news'));
    }
}
