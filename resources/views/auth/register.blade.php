<x-guest-layout>
    <x-jet-authentication-card>

        <div class="" style="margin: auto;">
            <div class="mt-4 mb-5" style="">
                {{--            <x-jet-authentication-card-logo />--}}
                <a href="/"> <img class="block w-75 " src="{{ URL::asset('img/logo_big_transparent.png') }}"></a>
            </div>

            <x-jet-validation-errors class="mb-4" />


            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mt-4">
                <!--<x-jet-label for="surname" value="{{ __('Přezdívka') }}" /> -->
                    <x-jet-input id="nick" class="block mt-1 w-full p-2 border-0 rounded-2 w-75 bg-light" type="text" name="nick" placeholder="Přezdívka " :value="old('nick')" required autofocus autocomplete="nickname" />
                </div>


                <div class="mt-4">
                <!--<x-jet-label for="email" value="{{ __('E-mail') }}" />-->
                    <x-jet-input id="email" class="block mt-1 w-full p-2 border-0 rounded-2 w-75 bg-light" type="email" name="email" placeholder="E-mail" :value="old('email')" required />
                </div>

                <br>
                <div class="mt-4">
                <!--<x-jet-label for="password" value="{{ __('Heslo') }}" />-->
                    <x-jet-input id="password" class="block mt-1 w-full p-2 border-0 rounded-2 w-75 bg-light" type="password" name="password" placeholder="Heslo" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                <!--<x-jet-label for="password_confirmation" value="{{ __('Potvrdit heslo') }}" />-->
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full p-2 border-0 rounded-2 w-75 bg-light" type="password" name="password_confirmation" placeholder="Potvrdit heslo" required autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-end mt-4">


                    <x-jet-button class="ml-4 h6 btn btn-primary">
                        {{ __('Zaregistruj mě') }}
                    </x-jet-button>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Už mám vlastní účet!') }}
                    </a>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
