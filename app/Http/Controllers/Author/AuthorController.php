<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Spatie\Permission\Traits\HasRoles;

class AuthorController extends Controller
{
    use HasRoles;

    /**
     * @return View
     */
    public function index(): View
    {
        $users = User::role('author')->paginate(9);

        return view('authors.index', compact('users'));
    }

    /**
     * @param $id
     * @return Factory|Application|View
     */
    public function show($id): Factory|Application|View
    {
        $user = User::with('articles')->findOrFail($id);
        return view('authors.show', compact('user'));

    }
}
