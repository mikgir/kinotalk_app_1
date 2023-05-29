@can('delete-own comments')
    @if($comment->user_id == Auth::id())
        <div xmlns:wire="http://www.w3.org/1999/xhtml">
            <button class="btn btn-primary blog-avatar-wrap__btn"  type="button" style="width: 10px; height: 10px; border: none"
                    wire:click="deleteComment({{ $comment->id }})"
                    wire:loading.attr="disabled">
               X
            </button>
        </div>
    @endif
@endcan
