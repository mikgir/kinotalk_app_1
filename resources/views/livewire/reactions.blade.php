<div xmlns:wire="http://www.w3.org/1999/xhtml" class="blog-wrap-content-btn__w2 d-flex">
    <p style="margin-right: 15px; margin-bottom: 0px; margin-top: 2px;">
        {{ $total }}
    </p>
    @auth()
        <button class="btn btn-primary btn-primary__w2" type="button"
                style="padding: 15px; background: {{ $like ? 'darkslateblue' : 'lightgray'}};"
                wire:click="setReaction('Like')"
                wire:loading.attr="disabled">
            Like
        </button>
    @endauth
    @guest
        <button class="btn btn-primary btn-primary__w2" type="button"
                style="padding: 15px; background: lightgray;"
                data-bs-toggle="modal" data-bs-target="#modalFormLike">
            Like
        </button>
        @include('comments.blocks.modal-form', [
            'model' => $model,
            'title' => '',
            'guest_title' => 'Чтобы поставить лайк необходимо войти в аккаунт.',
            'nested_form_name' => '',
            'modal_form_id' => 'modalFormLike',
        ])
    @endguest
</div>
