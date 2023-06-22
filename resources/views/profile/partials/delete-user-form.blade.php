<section class="mb-5">
    <header>
        <div class="card-header__wp5 block__wp5">{{ __('Удалить аккаунт') }}</div>
        <p class="mt-1 card-header__font font__wp5">
            {{ __('После удаления вашей учетной записи все ее ресурсы и данные будут безвозвратно удалены. Перед удалением своей учетной записи загрузите любые данные или информацию, которые вы хотите сохранить.') }}
        </p>
    </header>
    <div class="btn-update__wp3">
        @can('delete-own profile')
            <x-primary-button
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
                {{--            x-data=""--}}
                {{--            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"--}}
            >
                {{ __('Удалить аккаунт') }}
            </x-primary-button>
        @endcan
    </div>

    {{--    <x-bmodal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>--}}
    {{--        <form method="post" action="{{ route('profile.destroy', $user->id) }}" class="">--}}
    {{--            @csrf--}}
    {{--            @method('delete')--}}

    {{--            <h4 class="">--}}
    {{--                {{ __('Вы уверены, что хотите удалить свой аккаунт?') }}--}}
    {{--            </h4>--}}

    {{--            <p class="mt-1">--}}
    {{--                {{ __('После удаления вашей учетной записи все ее ресурсы и данные будут безвозвратно удалены. Пожалуйста, введите свой пароль, чтобы подтвердить, что вы хотите навсегда удалить свою учетную запись.') }}--}}
    {{--            </p>--}}

    {{--            <div class="mt-6">--}}
    {{--                <x-input-label for="password" value="{{ __('Пароль') }}" class="sr-only" />--}}

    {{--                <x-text-input--}}
    {{--                    id="password"--}}
    {{--                    name="password"--}}
    {{--                    type="password"--}}
    {{--                    class="mt-1 block w-3/4"--}}
    {{--                    placeholder="{{ __('Password') }}"--}}
    {{--                />--}}

    {{--                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />--}}
    {{--            </div>--}}

    {{--            <div class="mt-6 flex justify-end">--}}
    {{--                <x-secondary-button--}}
    {{--                    data-bs-dismiss="modal"--}}
    {{--                    x-on:click="$dispatch('close')"--}}
    {{--                >--}}
    {{--                    {{ __('Отмена') }}--}}
    {{--                </x-secondary-button>--}}
    {{--                @can('delete-own profile')--}}
    {{--                <x-danger-button class="btn btn-danger">--}}
    {{--                    {{ __('Удалить') }}--}}
    {{--                </x-danger-button>--}}
    {{--                @endcan--}}
    {{--            </div>--}}
    {{--        </form>--}}
    {{--    </x-bmodal>--}}
</section>
