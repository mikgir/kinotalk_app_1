<?php

namespace App\Http\Livewire;

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

    public function postComment(): void
    {
        $this->text = htmlspecialchars($this->text);
        $this->user_id = Auth::id();
        $this->validate();

        $comment = $this->model->comments()->make(['text' => htmlspecialchars($this->text)]);
        $comment->user()->associate(auth()->user());
        $comment->save();

        $this->text = '';
        $this->emitUp('refresh');
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Comment posted');
    }

    public function deleteComment($id, CommentRepository $repository): void
    {
        $comment = $repository->getOne($id);
        $comment->delete();

        $this->emitUp('refresh');
        session()->flash('message', 'Comment deleted');
    }

    public function render(CommentRepository $repository): View
    {
        $comments = $repository->getAllByModel($this->model);

        return view('livewire.comments', [
            'comments' => $comments
        ]);
    }
}
