<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Repositories\AuthorRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Spatie\Permission\Traits\HasRoles;

class AuthorController extends Controller
{
    use HasRoles;

    public $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $users = $this->authorRepository->getAll();

        return view('authors.index', compact('users'));
    }

    /**
     * @param $id
     * @return Factory|Application|View
     */
    public function show($id): Factory|Application|View
    {
        $user = $this->authorRepository->showAuthorWithArticles($id);

        return view('authors.show', compact('user'));
    }
}
