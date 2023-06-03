<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalForm">
    Оставить комментарий
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content__md2">
            <div class="modal-header">
                @auth
                    <h5 class="modal-title" id="exampleModalLabel">Оставьте свой комментарий:</h5>
                @endauth
                @guest
                    <h5 class="modal-title modal-title__text3" id="exampleModalLabel">Вы не авторизованы:</h5>
                @endguest
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @auth
                    @include('comments.create')
                @endauth
                @guest
                    <a href="{{ route('login') }}"
                       class="modal-title__text4">
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
