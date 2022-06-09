<x-guest-layout>
    <x-jet-authentication-card>

        <div class="" style="margin: auto;">
            <div class="mt-4 mb-5" style="">
                {{--            <x-jet-authentication-card-logo />--}}
                <a href="/"> <img class="block w-75 " style="    margin-left: auto; margin-right: auto;" src="{{ URL::asset('Img/logo_big_transparent.png') }}"></a>
            </div>

            <x-jet-validation-errors class="mb-4" />


            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mt-4" style="justify-content: center; display: flex;">
                <!--<x-jet-label for="surname" value="{{ __('validation.attributes.nickname') }}" /> -->
                    <x-jet-input id="nick" class="block mt-1 w-full p-2 border-0 rounded-2 w-75 bg-light" type="text" name="nick" placeholder="{{ __('validation.attributes.nickname') }} " :value="old('nick')" required autofocus autocomplete="nickname" />
                </div>


                <div class="mt-4" style="justify-content: center; display: flex;">
                <!--<x-jet-label for="email" value="{{ __('validation.attributes.email') }}" />-->
                    <x-jet-input id="email" class="block mt-1 w-full p-2 border-0 rounded-2 w-75 bg-light" type="email" name="email" placeholder="{{ __('validation.attributes.email') }}" :value="old('email')" required />
                </div>

                <br>
                <div class="mt-4" style="justify-content: center; display: flex;">
                <!--<x-jet-label for="password" value="{{ __('validation.attributes.password') }}" />-->
                    <x-jet-input id="password" class="block mt-1 w-full p-2 border-0 rounded-2 w-75 bg-light" type="password" name="password" placeholder="{{ __('validation.attributes.password') }}" required autocomplete="new-password" />
                </div>

                <div class="mt-4" style="justify-content: center; display: flex;">
                <!--<x-jet-label for="password_confirmation" value="{{ __('validation.attributes.confirm_password') }}" />-->
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full p-2 border-0 rounded-2 w-75 bg-light" type="password" name="password_confirmation" placeholder="{{ __('validation.attributes.confirm_password') }}" required autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-end mt-4">


                    <x-jet-button class="ml-4 h6 btn btn-primary">
                        {{ __('auth.create_account') }}
                    </x-jet-button>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('auth.i_already_have_my_own_account') }}
                    </a>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
