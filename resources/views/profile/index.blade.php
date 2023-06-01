<x-app-layout>

    <main class="mb-5">
        <h3 class="text-center m-5">Профиль пользователя</h3>
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-3">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Аккаунт</div>
                        <div class="w-100">
                            {{ Auth::user()->getFirstMedia('avatars') }}
                            <div class="col">
                                <div class="">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100">
                                    @include('profile.partials.update-password-form')
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100">
                                    @include('profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Личная информация</div>
                        <div class="card-body">
                          @if(isset($user->profile))
                              @include('profile.edit')
                              @else
                              @include('profile.create')
                          @endif
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">Странички социальных сетей</div>
                        <div class="card-body">
                            @if(isset($user->socialLinks))
                                @foreach($socialLinks as $key=>$link)
                                    @include('social.edit')
                                @endforeach
                            @endif
                                @include('social.create')
                        </div>
                    </div>
                    @hasrole('author')
                    <div class="card mb-4">
                        <div class="card-header flex-nowrap">
                            <span>Статьи</span>
                        </div>
                        <div class="card-body">
                            <a href="{{route('articles.create')}}" class="btn btn-primary">Написать статью</a>
                            <hr>
                            <span>Список статей</span>
                            <div class="table-responsive-md table-hover">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Категория</th>
                                        <th scope="col">Наименование</th>
                                        <th scope="col">Статус</th>
                                        <th scope="col">Активность</th>
                                        <th scope="col">Дата написания</th>
                                        <th scope="col">Дата изменения</th>
                                        <th scope="col">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Auth::user()->articles as $key=>$article)
                                    <tr>
                                        <th scope="row">{{$article->id}}</th>
                                        <td>{{$article->category->name}}</td>
                                        <td>{{$article->title}}</td>
                                        <td>{{$article->status}}</td>
                                        <td>{{$article->active}}</td>
                                        <td>{{$article->created_at}}</td>
                                        <td>{{$article->updated_at}}</td>
                                        <td>
                                            <a href="{{route('articles.edit', $article->id)}}" class="btn btn-outline-primary mb-2 w-100">Редактировать</a>
                                            <form method="post" action="{{route('articles.publish', $article->id)}}">
                                                @csrf
                                                @method('patch')
                                                <button type="submit" class="btn btn-outline-success mb-2 w-100">Опубликовать</button>
                                            </form>
                                            <a href="{{route('articles.destroy', $article->id)}}" class="btn btn-outline-danger mb-2 w-100">Удалить</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="card mb-4">
                            <div class="card-header flex-nowrap">
                                <span>Стать автором</span>
                            </div>
                            <div class="card-body">
                                <a href="{{route('becomeAuthor', $user->id)}}" class="btn btn-primary">Подать заявку</a>

                            </div>
                        </div>
                    @endhasrole

                </div>
            </div>
        </div>

    </main>
</x-app-layout>
