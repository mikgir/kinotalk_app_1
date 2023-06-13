@can('create-own comments')
    <div xmlns:wire="http://www.w3.org/1999/xhtml" class="col-2 text-end">
        <a type="button"
                data-bs-toggle="modal" data-bs-target="#modalFormReply_{{ $comment->id }}"
                wire:click="setReplyText({{ $comment->user_id }})"
                wire:loading.attr="disabled">
            <i class="fal fa-share"></i>
        </a>
        @include('comments.blocks.modal-form', [
            'model' => $model,
            'title' => 'Ответить на комментарий:',
            'nested_form_name' => 'comments.reply',
            'modal_form_id' => 'modalFormReply_' . $comment->id,
            'comment' => $comment,
        ])
    </div>
@endcan
