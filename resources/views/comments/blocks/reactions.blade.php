@auth
    <div xmlns:wire="http://www.w3.org/1999/xhtml" class="col-1">
        <span class="align-self-baseline mx-1" >
            {{ $totalArray[$comment->id] }}
        </span>
        <a type="button" class="link align-self-baseline" wire:click="setReaction({{ $comment->id }}, 'Like')"
           wire:loading.attr="disabled">
            @if($likeArray[$comment->id] )
                <i class="fa fa-heart"></i>
            @else
                <i class="fal fa-heart"></i>
            @endif
        </a>
    </div>
@endauth
