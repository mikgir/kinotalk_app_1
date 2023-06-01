<div class="blog-wrap-content">
    <div class="blog-avatar-wrap__w3">
        <div class="blog-avatar-img__p4">
            {{$comment->user->getFirstMedia('avatars')}}
        </div>
        <div class="blog-avatar-content__wrap">
            <h5 class="name">{{$comment->user->name}}</h5>
            <p class="blog-avatar-content__p4">{{ $comment->text }}</p>
            <span class="blog-avatar-content__span3">{{$comment->created_at->diffForHumans()}}</span>
        </div>
    </div>

    <div class="blog-wrap-content__btn">
        @include('comments.blocks.delete-button', ['comment' => $comment])
    </div>
</div>

