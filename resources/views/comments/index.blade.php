<div style="display: flex; margin-top: 10px;">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
         class="bi bi-chat-left-quote-fill mt-2 block-comments__svg"
         viewBox="0 0 16 16">
        <path
            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm7.194 2.766a1.688 1.688 0 0 0-.227-.272 1.467 1.467 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 5.734 4C4.776 4 4 4.746 4 5.667c0 .92.776 1.666 1.734 1.666.343 0 .662-.095.931-.26-.137.389-.39.804-.81 1.22a.405.405 0 0 0 .011.59c.173.16.447.155.614-.01 1.334-1.329 1.37-2.758.941-3.706a2.461 2.461 0 0 0-.227-.4zM11 7.073c-.136.389-.39.804-.81 1.22a.405.405 0 0 0 .012.59c.172.16.446.155.613-.01 1.334-1.329 1.37-2.758.942-3.706a2.466 2.466 0 0 0-.228-.4 1.686 1.686 0 0 0-.227-.273 1.466 1.466 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 10.07 4c-.957 0-1.734.746-1.734 1.667 0 .92.777 1.666 1.734 1.666.343 0 .662-.095.931-.26z"/>
    </svg>
    <p class="fs-3 ms-2">Комментарии</p>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalForm">
    Оставить комментарий
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                @auth
                    <h5 class="modal-title" id="exampleModalLabel">Оставьте свой
                        комментарий:</h5>
                @endauth
                @guest
                    <h5 class="modal-title" id="exampleModalLabel">Вы не авторизованы:</h5>
                @endguest
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @auth
                    @include('comments.create', ['article' => $article])
                @endauth
                @guest
                    <a href="{{ route('login') }}"
                       class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        Чтобы оставить комментарий необходимо войти в аккаунт.
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

{{--@if(Session::has('message'))--}}
{{--    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>--}}
{{--@endif--}}

{{ $comments->links() }}

@foreach($comments as $key=>$comment)
    @include('comments.show', ['comment' => $comment])
@endforeach

{{ $comments->links() }}
