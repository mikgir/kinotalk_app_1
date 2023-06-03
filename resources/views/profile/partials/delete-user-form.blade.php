<section class="mb-5">
    <header>
        <div class="card-header__wp5 block__wp5">{{ __('Удалить аккаунт') }}</div>
        <p class="mt-1 card-header__font font__wp5">
            {{ __('После удаления вашей учетной записи все ее ресурсы и данные будут безвозвратно удалены. Перед удалением своей учетной записи загрузите любые данные или информацию, которые вы хотите сохранить.') }}
        </p>
    </header>
    <div class="btn-update__wp3">
        <x-primary-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
            {{ __('Удалить аккаунт') }}
        </x-primary-button>
</div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable >
        <form method="post" action="{{ route('profile.destroy', $user->id) }}" class="">
            @csrf
            @method('delete')

            <h4 class="">
                {{ __('Вы уверены, что хотите удалить свой аккаунт?') }}
            </h4>

            <p class="mt-1">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="btn btn-danger">role_has_permissions
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
