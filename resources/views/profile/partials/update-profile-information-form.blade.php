<section class="mb-2">
    <header>
        <h4 class="">
            {{ __('Информация аккаунта') }}
        </h4>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Обновите информацию профиля своей учетной записи и адрес электронной почты.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>


    <form method="post" action="{{ route('profile.update') }}" class="form-control">
        @csrf
        @method('patch')

        <div class="form-group row">
            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar (optional)') }}</label>
            <div class="col-md-6">
                <input id="avatar" type="file" class="form-control" name="avatar">
            </div>
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" value="{{Auth::user()->name}}" class="form-control mb-2" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="form-control mb-2"  required autocomplete="username" />
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

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

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
