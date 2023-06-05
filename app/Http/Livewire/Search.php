<?php

namespace App\Http\Livewire;

use App\Repositories\SearchRepository;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Search extends Component
{
    public string $search = '';
    public $searchResults = [];

    public function render(SearchRepository $repository): View
    {
        if (mb_strlen($this->search) > 2) {
            $this->searchResults = $repository->getAllBySearch($this->search);
        } else {
            $this->searchResults = [];
        }

        return view('livewire.search');
    }
}
