


<!-- START of #TOP# -->
<x-top />
<!-- END OF #BOTTOM# -->

    <!-- START of header -->
    @include('home.inc.header')
    <!--/ END of header section -->

    
    <!-- START of flash notification --> 
    @if (session()->has('notification'))   
      <x-notification :bgcolor="session('color')" :object="session('object')">
        {!! session('notification') !!}
      </x-notification>
    @endif
    <!--/ END of flash notification -->

  
  <!-- PAGE SECTIONS -->


    <!-- START of WHY-SECTION -->
    <x-sections.why-section />
    <!--/ END of WHY-SECTION -->
    
    <!-- START of ARRIVAL-SECTION -->
    <x-sections.arrival-section />
    <!--/ END of  ARRIVAL-SECTION -->
    
  
  <!-- START of FOOTER -->
  @include('home.inc.footer')
  <!--/ END of CLIENT-SECTION -->
  
<!-- START OF #BOTTOM# -->
<x-bottom />
<!--/ END of #BOTTOM# -->
