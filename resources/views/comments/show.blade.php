<div class="blog-avatar-wrap p-3 bg-white rounded-3 justify-content-between">
    <div class="blog-avatar-img" style="width: 4rem; display: grid; justify-items: left;">
        {{$comment->user->getFirstMedia('avatars')}}
    </div>
    <div class="blog-avatar-content">
        <span class="name m-lg-2 ">{{$comment->user->name}}</span>
        <p style="width: 34rem; word-wrap: break-word;">{{ $comment->text }}</p>
        <span class="name m-lg-2 fw-bold float-end">{{$comment->created_at->diffForHumans()}}</span>
    </div>
    <div style="width: 8rem;">
        @include('comments.blocks.delete-button', ['comment' => $comment])
    </div>
</div>
