<?php

namespace App\Repositories;

use App\Contracts\AuthorRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Traits\HasRoles;

class AuthorRepository implements AuthorRepositoryInterface
{
    use HasRoles;

    public function getAllWithLastArticle()
    {
        return User::role('author')
                ->with(['articles' => function ($query) {
                    $query->where('status', 'PUBLISHED')
                        ->orderBy('created_at', 'desc')
                        ->latest();
                }])
                ->whereHas('articles', function ($query) {
                    $query->where('status', 'PUBLISHED');
                })
                ->paginate(9);
    }

    public function showAuthorWithArticles(int $id)
    {
        return User::with(['articles' => function ($query) {
                $query->where('status', 'PUBLISHED')
                    ->orderBy('created_at', 'desc');
            }])
            ->findOrFail($id);
    }

}
