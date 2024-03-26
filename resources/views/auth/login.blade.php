
  <x-guest-layout>
    <x-authentication-card class="py-4">




        <div class="container">

          

          <x-form :action="route('login')">
              
              @csrf

              <x-form-header form_title="Login" />

              <x-validation-errors class="mb-4 text-danger" />

              @if (session('status'))
                  <div class="mb-4 font-medium text-sm text-green-600">
                      {{ session('status') }}
                  </div>
              @endif



              <div class="row text-center mb-3">
                
                <div class="col-6 text-center">
                  <a href="{{route('google-page')}}" class="btn pt-2"> 

                    <div class="w-fit-content mx-auto">
                      <svg fill="#ff0000" height="35px" width="35px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 210 210" xml:space="preserve" stroke="#eee" stroke-width="0.0021000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Cyber Lord</title> <path d="M0,105C0,47.103,47.103,0,105,0c23.383,0,45.515,7.523,64.004,21.756l-24.4,31.696C133.172,44.652,119.477,40,105,40 c-35.841,0-65,29.159-65,65s29.159,65,65,65c28.867,0,53.398-18.913,61.852-45H105V85h105v20c0,57.897-47.103,105-105,105 S0,162.897,0,105z"></path> </g></svg>
                    </div>
                    <div class="text-danger">Google</div>
                    
                  </a>
                </div>

                {{-- <div class="col-4 text-center">
                  <a href="{{route('twitter-page')}}" class="btn pt-2" style="color: rgb(36, 178, 213)"> 
  
                    <div class="w-fit-content mx-auto">
                      <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35px" height="35px" viewBox="0,0,256,256"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="none" stroke-linecap="butt" stroke-linejoin="none" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path transform="scale(5.12,5.12)" d="M39,4c3.866,0 7,3.134 7,7v28c0,3.866 -3.134,7 -7,7h-28c-3.866,0 -7,-3.134 -7,-7v-28c0,-3.866 3.134,-7 7,-7z" id="strokeMainSVG" fill="#40bbe7" stroke="#40bbe7" stroke-width="6" stroke-linejoin="round"></path><g transform="scale(5.12,5.12)" fill="#000000" stroke="none" stroke-width="1" stroke-linejoin="miter"><path d="M11,4c-3.866,0 -7,3.134 -7,7v28c0,3.866 3.134,7 7,7h28c3.866,0 7,-3.134 7,-7v-28c0,-3.866 -3.134,-7 -7,-7zM13.08594,13h7.9375l5.63672,8.00977l6.83984,-8.00977h2.5l-8.21094,9.61328l10.125,14.38672h-7.93555l-6.54102,-9.29297l-7.9375,9.29297h-2.5l9.30859,-10.89648zM16.91406,15l14.10742,20h3.06445l-14.10742,-20z"></path></g></g></svg>
                    </div> 
                    X            
  
                  </a>
                </div> --}}

                <div class="col-6 text-center">
                  <a href="{{route('github-page')}}" class="btn pt-2"> 
  
                    <div class="w-fit-content mx-auto">
                      <svg height="35px" width="35px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#977ed3" stroke="#977ed3"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Cyber Lord</title> <desc>Cyber Lord</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-140.000000, -7559.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M94,7399 C99.523,7399 104,7403.59 104,7409.253 C104,7413.782 101.138,7417.624 97.167,7418.981 C96.66,7419.082 96.48,7418.762 96.48,7418.489 C96.48,7418.151 96.492,7417.047 96.492,7415.675 C96.492,7414.719 96.172,7414.095 95.813,7413.777 C98.04,7413.523 100.38,7412.656 100.38,7408.718 C100.38,7407.598 99.992,7406.684 99.35,7405.966 C99.454,7405.707 99.797,7404.664 99.252,7403.252 C99.252,7403.252 98.414,7402.977 96.505,7404.303 C95.706,7404.076 94.85,7403.962 94,7403.958 C93.15,7403.962 92.295,7404.076 91.497,7404.303 C89.586,7402.977 88.746,7403.252 88.746,7403.252 C88.203,7404.664 88.546,7405.707 88.649,7405.966 C88.01,7406.684 87.619,7407.598 87.619,7408.718 C87.619,7412.646 89.954,7413.526 92.175,7413.785 C91.889,7414.041 91.63,7414.493 91.54,7415.156 C90.97,7415.418 89.522,7415.871 88.63,7414.304 C88.63,7414.304 88.101,7413.319 87.097,7413.247 C87.097,7413.247 86.122,7413.234 87.029,7413.87 C87.029,7413.87 87.684,7414.185 88.139,7415.37 C88.139,7415.37 88.726,7417.2 91.508,7416.58 C91.513,7417.437 91.522,7418.245 91.522,7418.489 C91.522,7418.76 91.338,7419.077 90.839,7418.982 C86.865,7417.627 84,7413.783 84,7409.253 C84,7403.59 88.478,7399 94,7399" id="github-[#142]"> </path> </g> </g> </g> </g></svg>
                    </div> 
                    GitHub            
  
                  </a>
                </div>

              </div>
              


              <div class="text-center my-2 OR-container">                
                <div class="OR">{{ __('OR') }}</div>
              </div>


              <div>
                  <x-label for="email" value="{{ __('Email') }}" />
                  <x-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
              </div>

              <div class="mt-4">
                  <x-label for="password" value="{{ __('Password') }}" />
                  <x-input id="password" type="password" name="password" required autocomplete="current-password" />
              </div>

              {{-- <div class="flex items-center justify-end mt-4"> --}}
              <x-button class="form-control btn btn-danger mt-2 mb-3 rounded-12px">
                  {{ __('Log in') }}
              </x-button>

              

              <div class="flex justify-between mt-4">
                <a class="d-block underline text-sm text-secondary" href="{{ route('register') }}">
                  {{ __('Register') }}
                </a>

                @if (Route::has('password.request'))
                    <a class="d-block underline text-sm text-secondary" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
              </div>
              {{-- </div> --}}
          </x-form>

        </div>


        
    </x-authentication-card>
</x-guest-layout>