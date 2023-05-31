<?php

namespace App\Repositories;

use App\Contracts\AuthorRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Traits\HasRoles;

class AuthorRepository implements AuthorRepositoryInterface
{
    use HasRoles;

    /**
     * @return Collection
     */
    public function getAllWithLastArticle(): Collection
    {
        return User::role('author')
                ->where('active', 1)
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

    /**
     * @param int $id
     * @return Collection
     */
    public function showAuthorWithArticles(int $id): Collection
    {
        return User::with(['articles' => function ($query) {
                $query->where('status', 'PUBLISHED')
                    ->orderBy('created_at', 'desc');
            }])
            ->findOrFail($id);
    }

}
