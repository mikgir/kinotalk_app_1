<div class="blog-wrap-content">
    <div class="blog-avatar-wrap__w3">
        <div class="blog-avatar-img__p4" style="width: 10%;">
            {{$comment->user->getFirstMedia('avatars')}}
        </div>
        <div class="blog-avatar-content__wrap" style="width: 90%;">
            <h5 class="name">{{$comment->user->name}}</h5>
            <p class="blog-avatar-content__p4">{{ $comment->text }}</p>
            <div style="display: flex;">
                <span class="blog-avatar-content__span3">{{ $comment->created_at->diffForHumans() }}</span>
                @if($comment->children_count)
                    <span class="blog-avatar-content__span3">Ответов: {{ $comment->children_count }}</span>
                @endif
                @if($comment->parent_id == null)
                    @include('comments.blocks.reply-button', ['comment' => $comment])
                @endif
            </div>
        </div>
    </div>

    <div class="blog-wrap-content__btn" style="display: flex;">
        @include('comments.blocks.edit-button', ['comment' => $comment])
        @include('comments.blocks.delete-button', ['comment' => $comment])
    </div>

    <div style="margin-left: 50px;">
        @if($comment->children->count())
            @foreach($comment->children as $child)
                @include('comments.show', ['comment' => $child])
            @endforeach
        @endif
    </div>
</div>
