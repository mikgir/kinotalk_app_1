@can('delete-own comments')
    @if($comment->user_id == Auth::id())
        <div xmlns:wire="http://www.w3.org/1999/xhtml" class="blog-wrap-content-btn__w2">
            <button class=" btn btn-primary  btn-primary__w2 "  type="button"
                    wire:click="deleteComment({{ $comment->id }})"
                    wire:loading.attr="disabled">
               X
            </button>
        </div>
    @endif
@endcan
