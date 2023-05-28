@can('create-own comments')
    <div class="row bg-transparent mt-3">
        <div class="blog-avatar-content w-100">
            <form wire:submit.prevent="postComment" method="POST"
                  action="{{route('comments.create', $article->id)}}"
                  class="form-control bg-transparent w-100">
                @csrf
                <label class="fs-5" for="text" style="color: var(--tg-body-color);"> Оставьте свой
                    комментарий: </label>
                <div class="form-group">
                    <div class="d-flex">
                        <div class="blog-avatar-img" style="width: 5rem;">
                            {{Auth::user()->getFirstMedia('avatars')}}
                        </div>
                        <textarea wire:model.defer="text" class="form-control @error('text') border-red-500 @enderror"
                                  type="text"
                                  name="text"></textarea>
                    </div>
                    @error('text')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <button class="btn btn-primary mt-3 mb-3 float-end" type="submit"
                        wire:loading.attr="disabled">
                    Коментировать
                </button>
            </form>
        </div>
    </div>
@endcan
