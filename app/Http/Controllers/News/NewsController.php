<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('news.index');
    }

    public function show(): View
    {
        return view('news.show');
    }
}
