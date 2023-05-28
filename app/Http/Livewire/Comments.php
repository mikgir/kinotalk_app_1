<?php

namespace App\Http\Livewire;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use App\Repositories\CommentRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comments extends Component
{
    public Article $article;
    public string $text;
    public int $user_id;
    protected array $rules;

    protected function getRules()
    {
        return (new StoreCommentRequest)->rules();
    }

    public function postComment(ArticleRepository $repository): void
    {
        $this->text = htmlspecialchars($this->text);
        $this->user_id = Auth::id();

        $this->rules = $this->getRules();
        $this->validate();

        $article = $repository->getOne($this->article->id);

        $article->comments()->create([
            'user_id' => Auth::id(),
            'article_id' => $this->article->id,
            'text' => htmlspecialchars($this->text),
        ]);

        $this->text = '';
        $this->article = Article::find($this->article->id);
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

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.comments');
    }
}
