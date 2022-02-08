<x-guest-layout>
    <x-jet-authentication-card>

        <div class="" style="margin: auto;">
            <div class="mt-4 mb-5" style="">
                {{--            <x-jet-authentication-card-logo />--}}
                <a href="/"> <img class="block w-75 " style="    margin-left: auto; margin-right: auto;" src="{{ URL::asset('Img/logo_big_transparent.png') }}"></a>
            </div>

            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 ">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div style="justify-content: center; display: flex;">
                <!-- <x-jet-label for="email" value="{{ __('E-mail nebo přezdívka') }}" /> -->
                    <x-jet-input id="email" class="block mt-3 w-full p-2 border-0 rounded-2 w-75 bg-light"  name="nick" placeholder="E-mail nebo přezdívka" :value="old('email')" required  autofocus />
                </div>

                <div class="mt-4 mb-4" style="justify-content: center; display: flex;">
                <!-- <x-jet-label for="password" value="{{ __('Heslo') }}" /> -->
                    <x-jet-input id="password" class="block mt-1 w-full p-2 border-0 rounded-2 w-75 bg-light" type="password" name="password" placeholder="Heslo" required autocomplete="current-password" />
                </div>


                <div class="flex items-center justify-end ">
                    <x-jet-button class="h6 btn btn-primary">
                        {{ __('Přihlásit se') }}
                    </x-jet-button>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}"">
                    {{ __('Chci nový účet!') }}
                    </a>
                </div>

{{--                <div class="flex items-center justify-end mt-1">--}}
{{--                    @if (Route::has('password.request'))--}}
{{--                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                            {{ __('Zapomněl si heslo?') }}--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                </div>--}}

            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
