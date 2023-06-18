<section class="mb-2">
    <header>
        <div class="card-header__wp5 block__wp5">{{ __('Изменение пароля') }}</div>

        <p class="mt-1 card-header__font font__wp5">
            {{ __('Убедитесь, что ваша учетная запись использует длинный случайный пароль, чтобы оставаться в безопасности.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="card-header__wp6 ">
            <x-input-label for="current_password" :value="__('Текущий пароль')" />
            <x-text-input id="current_password" name="current_password" type="password" class="form-control mb-2 card-header__inp3" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="card-header__wp6 ">
            <x-input-label for="password" :value="__('Новый пароль')" />
            <x-text-input id="password" name="password" type="password" class="form-control mb-2 card-header__inp3" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="card-header__wp6 ">
            <x-input-label for="password_confirmation" :value="__('Подтвердите пароль')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control mb-2 card-header__inp3" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="btn-update__wp3">
            <x-primary-button>{{ __('Сохранить') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="btn w-100"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
