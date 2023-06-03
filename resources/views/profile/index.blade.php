<x-app-layout>
    <main class="mb-5">
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Профиль пользователя</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl container-xl__wp2">
            <div class="row">
                <div class="col-xl-3">
                    <!-- Profile picture card-->
                    <div class="mb-4 mb-xl-0">
                        <div class="card-header__wp4">Аккаунт</div>
                        <div class="w-100 card-header__img">
                            {{ Auth::user()->getFirstMedia('avatars') }}
                            <div class="col">
                                <div>
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
                    <div>
                        <div class="card-header__wp4">Личная информация</div>
                        <div class="card-body">
                            @if(isset($user->profile))
                                @include('profile.edit')
                            @else
                                @include('profile.create')
                            @endif
                        </div>
                    </div>
                    <div class="block__wp5">
                        <div class="card-header__wp4">Странички социальных сетей</div>
                        <div class="card-body__wp4">
                            @if(isset($user->socialLinks))
                                @foreach($socialLinks as $key=>$link)
                                    @include('social.edit')
                                @endforeach
                            @endif
                            @include('social.create')
                        </div>
                    </div>
                    @if(!$user->active)
                        <p style="color: red; font-size: 2em">Вы заблокированы</p>
                    @else
                    @hasrole('author')
                    <div class="block__wp8">
                        <div class="card-header__wp4 flex-nowrap">
                            <span>Статьи</span>
                        </div>

                        <div class="card-body card-header__wp4">
                            <a href="{{route('articles.create')}}" class="btn btn-primary">Написать статью</a>
                            <div class="block__wp5">
                                <span>Список статей</span>
                                <div class="table-responsive-md table-hover block__wp6 small mb-1">
                                    <div class="table_col small__lab2">
                                        <div class="col__tab3">
                                            <span scope="col">ID</span>
                                        </div>
                                        <div class="col__tab3">
                                            <span scope="col">Категория</span>
                                        </div>
                                        <div class="col__tab3">
                                            <span scope="col">Наименование</span>
                                        </div>
                                        <div class="col__tab3">
                                            <span scope="col">Статус</span>
                                        </div>
                                        <div class="col__tab3">
                                            <span scope="col">Дата написания</span>
                                        </div>
                                        <div class="col__tab3">
                                            <span scope="col">Дата изменения</span>
                                        </div>
                                        <div class="col__tab3">
                                            <span scope="col">Действия</span>
                                        </div>
                                    </div>
                                    @foreach(Auth::user()->articles as $key=>$article)
                                        <div class="table_col small__lab2">
                                            <div class="col__tab4">
                                                <span scope="row">{{$article->id}}></span>
                                            </div>
                                            <div class="col__tab4">
                                                <span>{{$article->category->name}}</span>
                                            </div>
                                            <div class="col__tab4">
                                                <span>{{$article->title}}</span>
                                            </div>
                                            <div class="col__tab4">
                                                <span>{{$article->status}}</span>
                                            </div>
                                            <div class="col__tab4">
                                                <span>{{$article->created_at}}</span>
                                            </div>
                                            <div class="col__tab4">
                                                <span>{{$article->updated_at}}</span>
                                            </div>
                                            <div class="col__tab4">
                                                <span>Действия</span>
                                            </div>
                                        </div>
                                        <div class="block-btn__pr4">
                                            <div>
                                                <a href="{{route('articles.edit', $article->id)}}" class="btn btn__b3 btn-outline-primary mb-2">Редактировать</a>
                                            </div>
                                            <div>
                                                <form method="post" action="{{route('articles.publish', $article->id)}}">
                                                    @csrf
                                                    @method('patch')
                                                    <button type="submit" class="btn btn__b3 btn-outline-success mb-2 ">Опубликовать</button>
                                                </form>
                                            </div>
                                            <div>
                                                <a href="{{route('articles.destroy', $article->id)}}" class="btn btn__b3 btn-outline-danger mb-2">Удалить</a>
                                            </div>

                                        </div>
                                    @endforeach

                                    {{--  <table class="table">
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
                                                       <button type="submit" class="btn btn-outline-success mb-2">Опубликовать</button>
                                                   </form>
                                                   <a href="{{route('articles.destroy', $article->id)}}" class="btn btn-outline-danger mb-2 w-100">Удалить</a>
                                               </td>
                                           </tr>
                                           @endforeach
                                           </tbody>
                                       </table>--}}
                                </div>
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
                        @endif
                </div>
            </div>
        </div>

    </main>
</x-app-layout>
