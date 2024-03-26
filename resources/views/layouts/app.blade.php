  <!-- PAGE SECTIONS -->

    <!-- START of #TOP# -->
    <x-top />
    <!-- END OF #BOTTOM# -->

      <!-- START of header -->
      @include('home.inc.header')
      <!--/ END of header section -->

        {{-- <x-banner /> --}}

        <div class="min-h-screen bg-gray-100">

            {{-- @livewire('navigation-menu') --}}

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <!-- SUBTITLE-SECTION inclusion -->
                        <x-sections.subtitle subtitle='Your <span>Profile</span>'/>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts





  <!-- START of FOOTER -->
  @include('home.inc.footer')
  <!--/ END of CLIENT-SECTION -->
  
<!-- START OF #BOTTOM# -->
<x-bottom />
<!--/ END of #BOTTOM# -->
