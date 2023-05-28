@can('delete-own comments')
    @if($comment->user_id == Auth::id())
        <div>
            <button type="button" class="btn btn-danger"
                    wire:click="deleteComment({{ $comment->id }})"
                    wire:loading.attr="disabled">
                Удалить
            </button>
        </div>
    @endif
@endcan
