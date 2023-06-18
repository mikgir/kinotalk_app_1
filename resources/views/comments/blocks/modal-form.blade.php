<!-- Modal -->
<div wire:ignore.self class="modal fade" id={{ $modal_form_id }} tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content__md2">
            <div class="modal-header">
                @auth
                    <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                @endauth
                @guest
                    <h5 class="modal-title modal-title__text3" id="exampleModalLabel">Вы не авторизованы:</h5>
                @endguest
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @auth
                    @include($nested_form_name)
                @endauth
                @guest
                    <a href="{{ route('login') }}"
                       class="modal-title__text4">
                        {{ $guest_title }}
                    </a>
                @endguest
            </div>
            {{--            <div class="modal-footer">--}}
            {{--                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
            {{--                <button type="button" class="btn btn-primary">Save changes</button>--}}
            {{--            </div>--}}
        </div>
    </div>
</div>
