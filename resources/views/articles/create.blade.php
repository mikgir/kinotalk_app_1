<x-app-layout>
        <main class="mb-5">
            <h3 class="text-center m-5">Создание новой статьи</h3>
            <div class="container">
                <div class="row">
                    <form method="post" action="{{route('articles.store')}}" enctype="multipart/form-data" class="form-control">
                        @csrf
                        <div class="form-group">
                            <label for="category" class="form-label">Категория</label>
                            <select name="category" id="category" class="form-select form-select-sm mb-3 @error('category') border-red-500 @enderror"
                                    aria-label=".form-select-sm example">
                                <option selected>Выберете категорию</option>
                                @foreach($categories as $key=>$category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <p class="text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Изображение</label>
                            <input name="image" id="image" type="file" class="form-control mb-3 @error('image') border-red-500 @enderror"/>
                            @error('image')
                            <p class="text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title" class="form-label">Заголовок</label>
                            <input name="title" id="title" type="text" class="form-control mb-3 @error('title') border-red-500 @enderror" placeholder="Заголовок"/>
                            @error('title')
                            <p class="text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body" class="form-label">Содержание</label>
                            <textarea name="body" id="body" type="text" class="form-control mb-3 @error('body') border-red-500 @enderror"></textarea>
                            @error('body')
                            <p class="text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn my-4">Сохранить</button>
                    </form>
                </div>
            </div>
        </main>

</x-app-layout>


