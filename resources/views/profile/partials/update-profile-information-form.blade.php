<section class="mb-2">
    <header>
        <p class="mt-1 px-3 card-header__font">
            {{ __("Обновите информацию профиля своей учетной записи и адрес электронной почты.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>


    <form method="post" enctype="multipart/form-data" action="{{ route('profile.user_update', auth()->id()) }}">
        @csrf
        @method('patch')

        <div class="form-group row">
            <label for="avatar" class="col-md-4 col-form-label text-md-right card-header__wp5">{{ __('Аватар') }}</label>
            <div class="col-md-20">
                <input id="avatar" type="file" class="form-control card-header__inp3" name="avatar">
            </div>
        </div>

        <div class="card-header__wp6">
            <x-input-label for="name" :value="__('Имя')" />
            <x-text-input id="name" name="name" type="text" value="{{Auth::user()->name}}" class="form-control mb-2 card-header__inp3" required autofocus autocomplete="name"
                          placeholder="Введите имя"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="card-header__wp6">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" value="{{Auth::user()->email}}" class="form-control mb-2 card-header__inp3"
                          required autocomplete="username"
                          placeholder="Введите Email"/>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Ваш адрес электронной почты не подтвержден.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Нажмите здесь, чтобы повторно отправить электронное письмо с подтверждением.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('На ваш адрес электронной почты отправлена ​​новая ссылка для подтверждения.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="btn-update__wp3">
            <x-primary-button>{{ __('Сохранить') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
