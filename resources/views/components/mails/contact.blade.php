
    <!-- START of #TOP# -->
    <x-top />
    <!-- END OF #BOTTOM# -->

          
        <!-- PAGE SECTIONS -->
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts

        
  <!-- START of FOOTER -->
  @include('home.inc.footer')
  <!--/ END of CLIENT-SECTION -->
  
<!-- START OF #BOTTOM# -->
<x-bottom />
<!--/ END of #BOTTOM# -->
