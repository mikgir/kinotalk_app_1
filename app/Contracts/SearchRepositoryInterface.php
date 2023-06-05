<?php

namespace App\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface SearchRepositoryInterface
{

    /**
     * @param $search
     * @return Collection|LengthAwarePaginator
     */
    public function getAllBySearch($search): Collection|LengthAwarePaginator;
    
}
