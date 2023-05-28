@can('delete-own comments')
    @if($comment->user_id == Auth::id())
        <div xmlns:wire="http://www.w3.org/1999/xhtml">
            <button type="button" style="width: 20px; height: 20px; border: none"
                    wire:click="deleteComment({{ $comment->id }})"
                    wire:loading.attr="disabled">
               X
            </button>
        </div>
    @endif
@endcan
