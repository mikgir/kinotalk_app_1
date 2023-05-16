<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('main.index');
    }
}
