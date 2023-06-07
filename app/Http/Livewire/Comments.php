<?php

namespace App\Http\Livewire;

use App\Events\CallModerator;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Article;
use App\Models\News;
use App\Repositories\CommentRepository;
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

    public function postComment(): void
    {
        $this->user_id = Auth::id();
        $this->validate();

        $comment = $this->model->comments()->make(['text' => $this->text]);
        $comment->user()->associate(auth()->user());
        $comment->save();
        $this->dispatchBrowserEvent('closeModal');

        $callModerator = preg_match('/@moderator/', $comment->text);
        if ($callModerator) {
            event(new CallModerator($comment));
        }

        $this->clearText();
        $this->emitUp('refresh');
//        session()->flash('message', 'Comment posted');
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

    public function render(CommentRepository $repository): View
    {
        $comments = $repository->getAllByModel($this->model);

        return view('livewire.comments', [
            'comments' => $comments
        ]);
    }
}
