<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * @return Factory|Application|View
     */
    public function index(): Factory|Application|View
    {
        return view('support.index');
    }
}
