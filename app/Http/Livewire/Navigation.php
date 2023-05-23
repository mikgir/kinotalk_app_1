<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use App\Repositories\CategoryRepository;

class Navigation extends Component
{
    /**
     * @param CategoryRepository $repository
     * @return Factory|Application|View
     */
    public function render(CategoryRepository $repository): Factory|Application|View
    {
        $categories = $repository->getAll();
        return view('livewire.navigation', compact('categories'));
    }
}
