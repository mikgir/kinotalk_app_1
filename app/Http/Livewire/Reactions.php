<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Reactions extends Component
{
    public Article|News $model;
    public bool $like = false;
    public int $total = 0;

    public function mount()
    {
        $this->setLike();
        $this->setTotal();
    }

    public function setLike(): void
    {
        if (Auth::check()) {
            $user = Auth::user();
            $reacterFacade = $user->viaLoveReacter();
            $this->like = $reacterFacade->hasReactedTo($this->model, 'Like');
        }
    }

    public function setTotal(): void
    {
        $reactantFacade = $this->model->viaLoveReactant();
        $reactionTotal = $reactantFacade->getReactionTotal();
        $this->total = $reactionTotal->getCount();
    }

    public function setReaction($reactionType): void
    {
        $user = Auth::user();
        $reacterIsRegistered = $user->isRegisteredAsLoveReacter();

        $reactant = $this->model;
        $reactantIsRegistered = $reactant->isRegisteredAsLoveReactant();

        if ($reacterIsRegistered && $reactantIsRegistered) {
            $reacterFacade = $user->viaLoveReacter();
            $isReacted = $reacterFacade->hasReactedTo($reactant, $reactionType);

            if ($isReacted) {
                $reacterFacade->unreactTo($reactant, $reactionType);
                $this->like = false;
                $this->total--;
            } else {
                $reacterFacade->reactTo($reactant, $reactionType);
                $this->like = true;
                $this->total++;
            }
        }
    }

    public function render()
    {
        return view('livewire.reactions');
    }
}
