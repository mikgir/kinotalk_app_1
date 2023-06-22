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
                                    <li class="breadcrumb-item active" aria-current="page">Профиль пользователя: {{Auth::user()->name}}</li>
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
                    <div class="mb-4 mb-xl-0 glass-m-p">
                        <div class="card-header__wp4 user_text__w3">{{ $user->email }}</div>
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
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Удалить аккаунт</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                                <form method="post" action="{{ route('profile.destroy', $user->id) }}" class="">
                                    @csrf
                                    @method('delete')
                                    <div class="modal-body">
                                    <h4 class="">
                                        {{ __('Вы уверены, что хотите удалить свой аккаунт?') }}
                                    </h4>

                                    <p class="mt-1">
                                        {{ __('После удаления вашей учетной записи все ее ресурсы и данные будут безвозвратно удалены. Пожалуйста, введите свой пароль, чтобы подтвердить, что вы хотите навсегда удалить свою учетную запись.') }}
                                    </p>

                                    <div class="mt-6">
                                        <x-input-label for="password" value="{{ __('Пароль') }}" class="" />

                                        <x-text-input
                                            id="password"
                                            name="password"
                                            type="password"
                                            class="mt-1 block w-3/4"
                                            placeholder="{{ __('Password') }}"
                                        />

                                        {{--                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />--}}
                                    </div>

                                    </div>
                                    <div class="modal-footer">
                                        <div class="mt-6 flex justify-end">
                                            <x-secondary-button
                                                data-bs-dismiss="modal"
                                                {{--                    x-on:click="$dispatch('close')"--}}
                                            >
                                                {{ __('Отмена') }}
                                            </x-secondary-button>
                                            @can('delete-own profile')
                                                <x-danger-button class="btn btn-danger">
                                                    {{ __('Удалить') }}
                                                </x-danger-button>
                                            @endcan
                                        </div>
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <!-- Account details card-->
                    <div>
                        <div class="card-header__wp4">Личная информация</div>
                        <div class="card-body">
                          @if(isset($user->profile))
                              @include('profile.edit', ['profile' => $user->profile])
                              @else
                              @include('profile.create', ['profile' => $user->profile])
                          @endif
                        </div>
                    </div>
                    <div class="block__wp5">
                        <div class="card-header__wp4">Странички социальных сетей</div>
                        <div class="card-body__wp4">
                            @if(isset($user->socialLinks))
                            @foreach($user->socialLinks as $key => $link)
                                    @include('social.edit', ['link' => $link])
                                @endforeach
                            @endif
                                @include('social.create')
                        </div>
                    </div>
                    @if(!$user->active)
                        <p style="color: red; ">Вы заблокированы</p>
                    @else
                        @hasrole('author')
                        <div class="block__wp8">
                            <div class="card-header__wp4 flex-nowrap">
                                <span>Статьи</span>
                            </div>

                            <div class="card-body card-header__wp4">
                                <a href="{{route('articles.create')}}" class="">Написать статью <span><i class="fa fa-2x fa-feather-alt"></i></span></a>
                                <div class="block__wp5">
                            <span>Список статей</span>
                                    <div class="table-responsive-md table-hover block__wp6 small mb-2">
                                        <div class="row small__lab2 mb-3 table__w2">
                                            <div class="col-1 text-center col__tab3 ">
                                                <span scope="col">ID</span>
                                            </div>
                                            <div class="col-2 text-center col__tab3">
                                                <span scope="col">Категория</span>
                                            </div>
                                            <div class="col-3 text-center col__tab3">
                                                <span scope="col">Наименование</span>
                                            </div>
                                            <div class="col-2 text-center col__tab3">
                                                <span scope="col">Статус</span>
                                            </div>
                                            <div class="col-2 text-center col__tab3">
                                                <span scope="col">Дата написания</span>
                                            </div>
                                            <div class="col-2 text-center col__tab3">
                                                <span scope="col">Действия</span>
                                            </div>
                                        </div>
                                        @foreach(Auth::user()->articles as $key=>$article)
                                            <div class="row small__lab2 table__w3 table__w2">
                                                <div class="col-1 text-center col__tab4">
                                                    <span scope="row">{{$article->id}}></span>
                                                </div>
                                                <div class="col-2 text-center col__tab4">
                                                    <span>{{$article->category->name}}</span>
                                                </div>
                                                <div class="col-3 text-center col__tab4">
                                                    <span>{{$article->title}}</span>
                                                </div>
                                                <div class="col-2 text-center col__tab4">
                                                    <span>{{$article->status}}</span>
                                                </div>
                                                <div class="col-2 text-center col__tab4">
                                                    <span>{{$article->created_at}}</span>
                                                </div>
                                                <div class="col-2 text-center col__tab4">
                                                    <div class="block-btn__pr4 flex-column">
                                                        <div>
                                                            <a href="{{route('articles.edit', $article->id)}}" class="mb-2 bg-transparent">
                                                                <i class="fa fa-2x fa-pen-square"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <form method="post" action="{{route('articles.publish', $article->id)}}">
                                                                @csrf
                                                                @method('patch')
                                                                <button type="submit" style="border: none; outline: none" class="mb-2 bg-transparent">
                                                                    <i class="fa fa-2x  fa-share"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div>
                                                            <form method="post" action="{{route('articles.destroy', $article->id)}}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" style="border: none; outline: none" class="mb-2 bg-transparent">
                                                                    <i class="fa fa-2x fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                @endforeach
                            </div>
                            </div>
                            </div>
                        </div>
                        @else
                        <div class="block__wp5">
                            <div class="card-header__wp4">
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
