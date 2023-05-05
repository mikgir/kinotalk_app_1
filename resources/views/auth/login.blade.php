<x-guest-layout>
    <!-- Session Status -->
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--    <form method="POST" action="{{ route('login') }}" class="form-control">--}}
{{--        @csrf--}}

{{--        <!-- Email Address -->--}}
{{--        <div class="form-group">--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="form-group mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="form-control"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="current-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Remember Me -->--}}
{{--        <div class="block mt-4">--}}
{{--            <label for="remember_me" class="form-control">--}}
{{--                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">--}}
{{--                <span class="ml-2">{{ __('Remember me') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="link-dark" href="{{ route('password.request') }}">--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            <x-primary-button class="ml-3">--}}
{{--                {{ __('Log in') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
    <div class="container">
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="row">
{{--            <div class="col-xl-5"><img class="bg-img bg-center" src="{{asset('build/assets/src/assets/img/login-bg-2.jpg')}}" alt="looginpage"></div>--}}
            <div class="col-xl-6 p-0 mx-auto">
                <div>
                    <div>
{{--                        <div class="col-sm-4">--}}
{{--                            <div class="header__top-logo logo text-lg-center">--}}
{{--                                <a href="#" class="logo-dark"><img src="{{asset('build/assets/src/assets/img/logo/b_kinotalk.png')}}" alt="Logo"></a>--}}
{{--                                <a href="#" class="logo-light"><img src="{{asset('build/assets/src/assets/img/logo/w_kinotalk.png')}}" alt="Logo"></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="card login-card m-5">
                            <form class="form-control p-5 m-6" method="POST" action="{{ route('login') }}">
                                @csrf
                                <h4>Войти в аккаунт</h4>
                                <p>Введите адрес электронной почты и пароль для входа</p>
                                <div class="form-group">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <x-input-label for="password" :value="__('Пароль')" />

                                    <x-text-input id="password" class="form-control"
                                                  type="password"
                                                  name="password"
                                                  required autocomplete="current-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    <div class="show-hide"><span class="show"></span></div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Запомнить пароль</label>
                                    </div>
                                    <a class="link" href="#">Забыли пароль?</a>
                                    <button class="btn btn-primary btn-block" type="submit">Войти</button>
                                </div>
                                <h6 class="text-muted mt-4 or">Или через</h6>
                                <div class="social mt-4">
                                    <div>
                                        <a class="social-links" href="#" target="_blank">
                                            <i class="fa fa-google" data-feather="google"></i>
                                        </a>
                                        <a class="social-links" href="#" target="_blank">
                                            <i class="fa fa-vk" data-feather="vk"></i>
                                        </a>
                                        <a class="social-links" href="#" target="_blank">
                                            <i class="fa fa-telegram" data-feather="telegram"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-4 mb-0">
                                    <p class="mt-4 mb-0">Ещё не зарегистрированы?<a class="ms-2" href="{{ route('register') }}">Зарегистрировать</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
