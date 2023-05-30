<?php

namespace App\Http\Livewire;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public Article $article;
    public string $text = '';
    public int $user_id;

    protected string $paginationTheme = 'bootstrap';

    protected function rules()
    {
        return (new StoreCommentRequest)->rules();
    }

    public function postComment(): void
    {
        $this->text = htmlspecialchars($this->text);
        $this->user_id = Auth::id();
        $this->validate();

        Comment::create([
            'user_id' => Auth::id(),
            'article_id' => $this->article->id,
            'text' => htmlspecialchars($this->text),
        ]);

        $this->text = '';
        $this->article = Article::find($this->article->id);
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Comment posted');
    }

    public function deleteComment($id, CommentRepository $repository): void
    {
        $comment = $repository->getOne($id);

        if ($comment->delete()) {
            $this->article = Article::find($this->article->id);
            session()->flash('message', 'Comment deleted');
        }
    }

    public function render(CommentRepository $repository): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.comments', [
            'comments' => $repository->getAllByArticleId($this->article->id),
        ]);
    }
}
