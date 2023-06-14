<x-app-layout>
        <main class="mb-5">
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content glass-m">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Создание новой статьи</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container container__wo3">
                <div class="row">
                    <div class="col-xl-6 p-0 mx-auto">
                        <form method="post" action="{{route('articles.store')}}" enctype="multipart/form-data" class="form-div_post">
                            @csrf
                            <div class="form-group">
                                <label for="category" class="form-group__wp4">Категория</label>
                                <select name="category" id="category" class="card-header__inp3 form-select form-select-sm mb-3 @error('category') border-red-500 @enderror"
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
                                <label for="image" class="form-group__wp4">Изображение</label>
                                <input name="image" id="image" type="file" class="card-header__inp3 form-control mb-3 @error('image') border-red-500 @enderror"/>
                                @error('image')
                                <p class="text-red-500">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title" class="form-group__wp4">Заголовок</label>
                                <input name="title" id="title" type="text" class="card-header__inp3 form-control mb-3 @error('title') border-red-500 @enderror" placeholder="Заголовок"/>
                                @error('title')
                                <p class="text-red-500">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body" class="form-group__wp4">Содержание</label>
                                <textarea name="body" id="body" type="text" class="card-header__inp3 form-control mb-3 @error('body') border-red-500 @enderror"></textarea>
                                @error('body')
                                <p class="text-red-500">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="block-btn__pr">
                                <button type="submit" class="btn my-4 ">Сохранить</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </main>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media fullscreen preview searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

</x-app-layout>


