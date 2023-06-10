<?php

namespace App\Http\Livewire;

use App\Events\CallModerator;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Models\News;
use App\Repositories\CommentRepository;
use App\Repositories\UserRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public Article|News $model;
    public string $text = '';
    public int $user_id;
    public array $totalArray = [];
    public array $likeArray = [];

    protected string $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refresh' => '$refresh',
    ];

    protected function rules()
    {
        return (new StoreCommentRequest)->rules();
    }

    public function clearText(): void
    {
        $this->text = '';
    }

    public function setText($id, CommentRepository $repository): void
    {
        $comment = $repository->getOne($id);
        $this->text = $comment->text;
    }

    public function setReplyText($user_id, UserRepository $repository): void
    {
        $user = $repository->getOne($user_id);
        $this->text = $user->name . ', ';
    }

    public function callModerator(Comment $comment): void
    {
        if (str_contains($comment->text, '@moderator')) {
            event(new CallModerator($comment));
        }
    }

    public function postComment(): void
    {
        $this->user_id = Auth::id();
        $this->validate();

        $comment = $this->model->comments()->make([
            'text' => $this->text,
            'status' => 'PUBLISHED',
            'active' => 1,
        ]);
        $comment->user()->associate(auth()->user());
        $comment->save();
        $this->dispatchBrowserEvent('closeModal');

        $this->callModerator($comment);

        $this->clearText();
        $this->emitUp('refresh');
//        session()->flash('message', 'Comment posted');
    }

    public function replyComment($id): void
    {
        $this->user_id = Auth::id();
        $this->validate();

        $comment = $this->model->comments()->make([
            'text' => $this->text,
            'status' => 'PUBLISHED',
            'active' => 1,
            'parent_id' => $id,
        ]);
        $comment->user()->associate(auth()->user());
        $comment->save();
        $this->dispatchBrowserEvent('closeModal');

        $this->callModerator($comment);

        $this->clearText();
        $this->emitUp('refresh');
//        session()->flash('message', 'Comment replied');
    }

    public function editComment($id, CommentRepository $repository): void
    {
        $comment = $repository->getOne($id);
        $this->user_id = Auth::id();
        $this->validate();

        $comment->update(['text' => $this->text]);
        $this->dispatchBrowserEvent('closeModal');

        $this->clearText();
        $this->emitUp('refresh');
//        session()->flash('message', 'Comment edited');
    }

    public function deleteComment($id, CommentRepository $repository): void
    {
        $comment = $repository->getOne($id);
        $comment->delete();

        $this->clearText();
        $this->emitUp('refresh');
//        session()->flash('message', 'Comment deleted');
    }

    public function setReaction($id, $reactionType, CommentRepository $repository): void
    {
        $user = Auth::user();
        $reacterIsRegistered = $user->isRegisteredAsLoveReacter();

        $comment = $repository->getOne($id);
        $reactantIsRegistered = $comment->isRegisteredAsLoveReactant();

        if ($reacterIsRegistered && $reactantIsRegistered) {
            $reacterFacade = $user->viaLoveReacter();
            $isReacted = $reacterFacade->hasReactedTo($comment, $reactionType);

            if ($isReacted) {
                $reacterFacade->unreactTo($comment, $reactionType);
            } else {
                $reacterFacade->reactTo($comment, $reactionType);
            }

            $this->emitUp('refresh');
        }
    }

    public function fillReactionArrays($comment, $user_id): void
    {
        $total = $comment->loveReactant->reactionTotal;
        $this->totalArray[$comment->id] = isset($total) ? $total->count : 0;

        $like = false;
        $reactions = $comment->loveReactant->reactions;
        if ($reactions->count()) {
            foreach ($reactions as $reaction) {
                if ($reaction->reacter->reacterable->id == $user_id) {
                    $like = true;
                    break;
                }
            }
        }
        $this->likeArray[$comment->id] = $like;
    }

    public function render(CommentRepository $repository): View
    {
        $comments = $repository->getAllByModel($this->model);
        $this->totalArray = [];
        $this->likeArray = [];
        $user_id = Auth::id();

        foreach ($comments as $comment) {
            $this->fillReactionArrays($comment, $user_id);

            foreach ($comment->children as $child) {
                $this->fillReactionArrays($child, $user_id);
            }
        }

        return view('livewire.comments', [
            'comments' => $comments,
        ]);
    }
}
