{{--<div class="blog-wrap-content">
    <div class="blog-avatar-img__p4 d-flex" >
        {{$comment->user->getFirstMedia('avatars')}}
        <span class="name align-self-start name__color">{{$comment->user->name}}</span>
    </div>
    <div class="blog-avatar-wrap__w3">
        <div class="blog-avatar-content__wrap">
            @if($comment->parent_id == null)
                @include('comments.blocks.reply-button', ['comment' => $comment])
            @endif
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <div class="d-flex align-items-baseline">
            <span class="blog-avatar-content__span3 col-7 align-self-baseline text-end">{{ $comment->created_at->diffForHumans() }}</span>
            @if($comment->children->count())
                <span class="blog-avatar-content__span3 col-4 align-self-baseline text-center">Ответов: {{ $comment->children->count() }}</span>
            @endif
        </div>
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
--}}
<div class="blog-wrap__style">
    <div class="blog-wrap-content">
        <div class="blog-avatar-img__p4 d-flex" >
            {{$comment->user->getFirstMedia('avatars')}}
        </div>
        <div class="blog-text__content">
            <span class="name align-self-start name__color">{{$comment->user->name}}</span>
            <p class="blog-avatar-content__p4">{{ $comment->text }}</p>
            <span class="blog-avatar-content__span3 col-7 align-self-baseline text-end">{{ $comment->created_at->diffForHumans() }}</span>
            <span class="blog-wrap__count">
                @if($comment->children->count())
                    <span>Ответов: {{ $comment->children->count() }}</span>
                @endif
            </span>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        @if($comment->parent_id == null)
            @include('comments.blocks.reply-button', ['comment' => $comment])
        @endif

            @include('comments.blocks.edit-button', ['comment' => $comment])
            @include('comments.blocks.delete-button', ['comment' => $comment])
            @include('comments.blocks.reactions', ['comment' => $comment])
    </div>

    <div class="blog-wrap_margin__left">
        @if($comment->children->count())
            @foreach($comment->children as $child)
                @include('comments.show', ['comment' => $child])
            @endforeach
        @endif
    </div>
</div>

