<x-guest-layout>
    <x-authentication-card>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form class="border border-danger border-2 p-4 mx-auto my-3" method="POST" action="{{ route('password.email') }}"  style="max-width: 450px; border-radius: 12px;">
            
            @csrf

            <div class="text-start text-center">
              <img src="{{asset('home/images/favicon.png')}}" alt="" class="ms-0" style="width: 60px; height: 60px;">
              <h2 class="text-center fs-2 pe-0 me-0 mt-2 border-bottom border-danger mx-auto d-inline-block" style="width:fit-content; color:red;">
                {{ __('Recover password') }}
              </h2>
            </div>

            <div class="mb-4 text-sm text-gray-600">
              {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="border-radius: 12px;"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="btn btn-danger">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
