<div class="blog-avatar-wrap__w3">
    <div class="blog-avatar-img">
        {{$comment->user->getFirstMedia('avatars')}}
        <h5 class="name">{{$comment->user->name}}</h5>
        <span class="blog-avatar-content__span3">{{$comment->created_at->diffForHumans()}}</span>
    </div>
    <div class="blog-avatar-content">
        <p class="blog-avatar-content__p4">{{ $comment->text }}</p>
    </div>
    <div class="blog-avatar-wrap__btn">
        @include('comments.blocks.delete-button', ['comment' => $comment])
    </div>
</div>
