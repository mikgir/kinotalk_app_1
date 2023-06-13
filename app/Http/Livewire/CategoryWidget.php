<?php

namespace App\Http\Livewire;

use App\Repositories\CategoryRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class CategoryWidget extends Component
{
    /**
     * @param CategoryRepository $repository
     * @return Factory|Application|View
     */
    public function render(CategoryRepository $repository): Factory|Application|View
    {
        $categories = $repository->getHeaderAll();
        return view('livewire.category-widget', compact('categories'));
    }
}
