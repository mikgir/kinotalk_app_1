<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class UserWidget extends Component
{
    public $user;

    /**
     * @return Factory|Application|View
     */
    public function render(): Factory|Application|View
    {
        return view('livewire.user-widget');
    }
}
