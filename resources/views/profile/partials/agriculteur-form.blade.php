<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informations sur votre exploitation') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Mettez à jour le nom de votre exploitation ou votre numéro de SIRET") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="exploitation_name" :value="__('Nom de l\'exploitation')" />
            <x-text-input id="exploitation_name" name="exploitation_name" type="text" class="mt-1 block w-full" :value="old('exploitation_name', $user->exploitation_name)" required autofocus autocomplete="exploitation_name" />
            <x-input-error class="mt-2" :messages="$errors->get('exploitation_name')" />
        </div>

        <div>
            <x-input-label for="siret_number" :value="__('Numéro de SIRET')" />
            <x-text-input id="siret_number" name="siret_number" type="text" class="mt-1 block w-full" :value="old('siret_number', $user->siret_number)" required autofocus autocomplete="siret_number" />
            <x-input-error class="mt-2" :messages="$errors->get('siret_number')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="save">{{ __('Enregistrer') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
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