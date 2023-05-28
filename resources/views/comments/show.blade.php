<div class="blog-avatar-wrap p-3 bg-transparent justify-content-between">
    <div class="blog-avatar-img">
        {{$comment->user->getFirstMedia('avatars')}}
        <span class="name ml-2 fw-bold">{{$comment->user->name}}</span>
    </div>
    <div class="blog-avatar-content bg-transparent">
        <p>{{ $comment->text }}</p>
    </div>
    <div>
        @include('comments.blocks.delete-button', ['comment' => $comment])
    </div>
</div>
