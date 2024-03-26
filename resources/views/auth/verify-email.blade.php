<x-guest-layout>
    <x-authentication-card>


        <div class="border border-danger border-2 p-4 mx-auto my-3 rounded-12px">

          <x-form-header form_title="Email verification" />

          <div class="mt-2 mb-4 text-sm text-gray-600">
              {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
          </div>

          @if (session('status') == 'verification-link-sent')
              <div class="mb-4 font-medium text-sm text-green-600">
                  {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
              </div>
          @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button type="submit" class="btn  btn-danger">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <div class="d-flex justify-between mt-4">
                <a
                    href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    {{ __('Edit Profile') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>

        </div>

    </x-authentication-card>
</x-guest-layout>
