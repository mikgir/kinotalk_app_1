@can('delete-own comments')
    @if($comment->user->id == Auth::id())
        <div>
            <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                @csrf
                @method('delete')
                <x-dropdown-link :href="route('comments.destroy', $comment->id)"
                                 onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Удалить') }}
                </x-dropdown-link>
            </form>
        </div>
    @endif
@endcan
