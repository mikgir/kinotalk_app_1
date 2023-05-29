@can('create-own comments')
    <div class="row bg-transparent mt-3" xmlns:wire="http://www.w3.org/1999/xhtml">
        <div class="blog-avatar-content w-100">
            <form wire:submit.prevent="postComment" method="POST"
                  action="{{route('comments.create', $article->id)}}"
                  class="form-control bg-transparent w-100">
                @csrf
                <label class="fs-5" for="text"> Оставьте свой
                    комментарий: </label>
                <div class="form-group">
                    <div class="d-flex">
                        <div class="blog-avatar-img">
                            {{Auth::user()->getFirstMedia('avatars')}}
                        </div>
                        <textarea wire:model.defer="text" class="fs-5 form-control mx-lg-2 bg-transparent @error('text') border-red-500 @enderror"
                                  type="text"
                                  name="text"></textarea>
                    </div>
                    @error('text')
                    <p class="fs-3 ms-2 fs-5">{{$message}}</p>
                    @enderror
                </div>
                <button class="btn btn-primary mt-3 mb-3 float-end" type="submit"
                        wire:loading.attr="disabled">
                    Комментировать
                </button>
            </form>
        </div>
    </div>
@endcan
