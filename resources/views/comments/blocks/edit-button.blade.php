@can('edit-own comments')
    @if($comment->user_id == Auth::id())
        <div xmlns:wire="http://www.w3.org/1999/xhtml" class="blog-wrap-content-btn__w2">
            <button class="btn btn-primary btn-primary__w2" type="button"
                    data-bs-toggle="modal" data-bs-target="#modalFormEdit_{{ $comment->id }}"
                    wire:click="setText({{ $comment->id }})"
                    wire:loading.attr="disabled">
                edit
            </button>
            @include('comments.blocks.modal-form', [
                'model' => $model,
                'title' => 'Редактировать комментарий:',
                'nested_form_name' => 'comments.edit',
                'modal_form_id' => 'modalFormEdit_' . $comment->id,
                'comment' => $comment,
            ])
        </div>
    @endif
@endcan
