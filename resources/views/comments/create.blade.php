@can('create-own comments')
    <div class="row bg-transparent mt-3">
        <div class="blog-avatar-content w-100">
            <form method="POST" action="{{route('comments.create', $article->id)}}"
                  class="form-control bg-transparent w-100">
                @csrf
                <div class="form-group">
                    <div class="blog-avatar-img">
                        {{Auth::user()->getFirstMedia('avatars')}}
                    </div>
                    <label class="small mb-1" for="text"> Оставьте комментарий </label>
                    <textarea class="form-control @error('text') border-red-500 @enderror" type="text"
                              name="text"></textarea>
                    @error('text')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <button class="btn btn-primary mt-3 mb-3" type="submit">Коментировать</button>
            </form>
        </div>
    </div>
@endcan