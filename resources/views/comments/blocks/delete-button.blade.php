@can('delete-own comments')
    @if($comment->user_id == Auth::id())
        <div xmlns:wire="http://www.w3.org/1999/xhtml" class="col-2 text-center">
            <a type="button"
                    data-bs-toggle="modal" data-bs-target="#modalFormDelete_{{ $comment->id }}"
                    wire:click="setText({{ $comment->id }})"
                    wire:loading.attr="disabled">
                <i class="fa fa-trash"></i>
            </a>
            @include('comments.blocks.modal-form', [
                'model' => $model,
                'title' => 'Удалить комментарий:',
                'nested_form_name' => 'comments.delete',
                'modal_form_id' => 'modalFormDelete_' . $comment->id,
                'comment' => $comment,
            ])
        </div>
    @endif
@endcan
