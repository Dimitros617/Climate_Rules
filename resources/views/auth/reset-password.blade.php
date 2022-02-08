<x-guest-layout>
    <x-jet-authentication-card>

        <div class="">
            <div style="">
                {{--            <x-jet-authentication-card-logo />--}}
                <a href="/"> <img class="block w-75 " style="    margin-left: auto; margin-right: auto;" src="{{ URL::asset('Img/logo_big_transparent.png') }}"></a>
            </div>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="block" style="justify-content: center; display: flex;">
                    <x-jet-label for="email" value="{{ __('E-mail') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                </div>

                <div class="mt-4" style="justify-content: center; display: flex;">
                    <x-jet-label for="password" value="{{ __('Heslo') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4" style="justify-content: center; display: flex;">
                    <x-jet-label for="password_confirmation" value="{{ __('Potvrďte heslo') }}" />
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button>
                        {{ __('Resetovat heslo') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
