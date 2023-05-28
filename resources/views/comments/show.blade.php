<div class="blog-avatar-wrap p-3 bg-transparent rounded border justify-content-between">
    <div class="blog-avatar-img">
        {{$comment->user->getFirstMedia('avatars')}}
        <span class="name ml-3 ">{{$comment->user->name}}</span>
    </div>
    <div class="blog-avatar-content w-75">
        <p class="text-center">{{ $comment->text }}</p>
        <span>{{$comment->created_at->diffForHumans()}}</span>
    </div>
    <div>
        @include('comments.blocks.delete-button', ['comment' => $comment])
    </div>
</div>
