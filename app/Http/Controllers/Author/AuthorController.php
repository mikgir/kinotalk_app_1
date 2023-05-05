<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class AuthorController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('authors.index');
    }
}
