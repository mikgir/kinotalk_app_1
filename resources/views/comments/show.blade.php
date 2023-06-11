<div class="blog-wrap-content">
    <div class="blog-avatar-wrap__w3">
        <div class="blog-avatar-img__p4" >
            {{$comment->user->getFirstMedia('avatars')}}
        </div>
        <div class="blog-avatar-content__wrap">
            <h5 class="name">{{$comment->user->name}}</h5>
            <p class="blog-avatar-content__p4">{{ $comment->text }}</p>
            <div class="d-flex">
                <span class="blog-avatar-content__span3">{{ $comment->created_at->diffForHumans() }}</span>
                @if($comment->parent_id == null)
                    @include('comments.blocks.reply-button', ['comment' => $comment])
                @endif
                @if($comment->children->count())
                    <span class="blog-avatar-content__span3">Ответов: {{ $comment->children->count() }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        @include('comments.blocks.reactions', ['comment' => $comment])
        @include('comments.blocks.edit-button', ['comment' => $comment])
        @include('comments.blocks.delete-button', ['comment' => $comment])
    </div>

    <div class="blog-wrap_margin__left">
        @if($comment->children->count())
            @foreach($comment->children as $child)
                @include('comments.show', ['comment' => $child])
            @endforeach
        @endif
    </div>
</div>
