<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class OffCanvas extends Component
{
    /**
     * @return Factory|Application|View
     */
    public function render(): Factory|Application|View
    {
        $authors = User::role('author')->get();
        return view('livewire.off-canvas', compact('authors'));
    }
}
