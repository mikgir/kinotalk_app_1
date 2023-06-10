@auth
    <div xmlns:wire="http://www.w3.org/1999/xhtml" class="blog-wrap-content-btn__w2 d-flex">
        <p style="margin-right: 15px; margin-bottom: 0px; margin-top: 2px;">
            {{ $totalArray[$comment->id] }}
        </p>
        <button class="btn btn-primary btn-primary__w2" type="button"
                style="padding: 15px; background: {{ $likeArray[$comment->id] ? 'darkslateblue' : 'lightgray'}};"
                wire:click="setReaction({{ $comment->id }}, 'Like')"
                wire:loading.attr="disabled">
            Like
        </button>
    </div>
@endauth
