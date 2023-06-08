@can('create-own comments')
    <div xmlns:wire="http://www.w3.org/1999/xhtml" class="blog-wrap-content-btn__w2">
        <button class="btn btn-primary btn-primary__w2" type="button" style="padding: 15px;"
                data-bs-toggle="modal" data-bs-target="#modalFormReply_{{ $comment->id }}"
                wire:click="setReplyText({{ $comment->user_id }})"
                wire:loading.attr="disabled">
            Ответить
        </button>
        @include('comments.blocks.modal-form', [
            'model' => $model,
            'title' => 'Ответить на комментарий:',
            'nested_form_name' => 'comments.reply',
            'modal_form_id' => 'modalFormReply_' . $comment->id,
            'comment' => $comment,
        ])
    </div>
@endcan
