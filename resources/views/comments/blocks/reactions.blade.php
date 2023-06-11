@auth
    <div xmlns:wire="http://www.w3.org/1999/xhtml" class="blog-wrap-content-btn__w2 d-flex">
        <p class="align-self-baseline mx-1" >
            {{ $totalArray[$comment->id] }}
        </p>
        <a type="button" class="link align-self-baseline" wire:click="setReaction({{ $comment->id }}, 'Like')"
           wire:loading.attr="disabled"><i class="fa fa-heart"></i></a>
{{--        <button class="link-danger" type="button"--}}
{{--                style="background: {{ $likeArray[$comment->id] ? 'darkslateblue' : 'lightgray'}};"--}}
{{--                wire:click="setReaction({{ $comment->id }}, 'Like')"--}}
{{--                wire:loading.attr="disabled">--}}
{{--            <i class="fa fa-heart"></i>--}}
{{--        </button>--}}
    </div>
@endauth
