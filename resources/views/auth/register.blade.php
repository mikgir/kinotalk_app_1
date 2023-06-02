<x-guest-layout>
    <main>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Регистрация</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xl-6 p-0 mx-auto">
                    <div class="form-div">
                        <form class="form-div_post" method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                            <div class="card-header__wp6">
                                <x-input-label for="name" :value="__('Имя')" />
                                <div><x-text-input id="name" class="block mt-1 w-full form-control input-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /></div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4 card-header__wp6">
                                <x-input-label for="email" :value="__('Email')" />
                                <div> <x-text-input id="email" class="block mt-1 w-full form-control input-control" type="email" name="email" :value="old('email')" required autocomplete="username" /></div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4 card-header__wp6">
                                <x-input-label for="password" :value="__('Пароль')" />

                                <div> <x-text-input id="password" class="block mt-1 w-full form-control input-control"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="new-password" /></div>

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4 card-header__wp6">
                                <x-input-label for="password_confirmation" :value="__('Подтвердите пароль')" />

                                <div>  <x-text-input id="password_confirmation" class="block mt-1 w-full form-control input-control"
                                                     type="password"
                                                     name="password_confirmation" required autocomplete="new-password" /></div>

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <div class="form-group row mt-4 card-header__wp6">
                                <div>
                                    <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Аватар (опционально)') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="avatar" type="file" class="form-control" name="avatar">
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a class="modal-title__text4 " href="{{ route('login') }}">
                                    {{ __('Уже зарегистрирован?') }}
                                </a>

                                <x-primary-button class="btn btn-primary btn-block link-checkbox_btn">
                                    {{ __('Зарегистрироваться') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

</x-guest-layout>
