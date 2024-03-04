<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Mettre à jour le mot de passe') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Veillez à ce que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="input-mdp">
            <x-input-label for="update_password_current_password" :value="__('Mot de passe actuel')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <button id="togglePassword" type="button">
                    <i id="eyeOpen" class="fas fa-eye" style="display: none;"></i>
                    <i id="eyeClosed" class="fas fa-eye-slash"></i>
            </button>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <script>
            document.getElementById('togglePassword').addEventListener('click', function (e) {
                const passwordInput = document.getElementById('update_password_current_password');
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                const eyeOpen = document.getElementById('eyeOpen');
                const eyeClosed = document.getElementById('eyeClosed');
                if (type === 'password') {
                    eyeOpen.style.display = 'none';
                    eyeClosed.style.display = 'inline';
                } else {
                    eyeOpen.style.display = 'inline';
                    eyeClosed.style.display = 'none';
                }
            });
        </script>

        <div class="input-mdp">
            <x-input-label for="update_password_password" :value="__('Nouveau mot de passe')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <button id="update_password_toggle" type="button">
                    <i id="eyeOpenUpdate" class="fas fa-eye" style="display: none;"></i>
                    <i id="eyeClosedUpdate" class="fas fa-eye-slash"></i>
            </button>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <script>
            document.getElementById('update_password_toggle').addEventListener('click', function (e) {
                const passwordInput = document.getElementById('update_password_password');
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                const eyeOpen = document.getElementById('eyeOpenUpdate');
                const eyeClosed = document.getElementById('eyeClosedUpdate');
                if (type === 'password') {
                    eyeOpen.style.display = 'none';
                    eyeClosed.style.display = 'inline';
                } else {
                    eyeOpen.style.display = 'inline';
                    eyeClosed.style.display = 'none';
                }
            });
        </script>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmer le nouveau mot de passe')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="save">{{ __('Enregistrer') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Sauvegardé !') }}</p>
            @endif
        </div>
    </form>
</section>
