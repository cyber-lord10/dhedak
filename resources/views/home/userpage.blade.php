
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
    

    <!-- START of SIDE-SECTION -->
    <x-sections.slider-section :adverts="$adverts"/>
    <!--/ END of SIDE-SECTION -->

  
  <!-- PAGE SECTIONS -->

    <!-- START of WHY-SECTION -->
    <x-sections.why-section />
    <!--/ END of WHY-SECTION -->
    
    <!-- START of ARRIVAL-SECTION -->
    <x-sections.arrival-section />
    <!--/ END of  ARRIVAL-SECTION -->
    
    <!-- START of PRODUCTS-SECTION -->
    <x-sections.products-section :products="$products" :categories="$nav_categories"/>
    <!--/ END of PRODUCTS-SECTION -->

    <!-- START of SUBSCRIBE-SECTION -->
    <x-sections.subscribe-section />
    <!--/ END of SUBSCRIBE-SECTION -->

    <!-- START of CLIENT-SECTION -->
    <x-sections.client-section :testimonials="$testimonials" />
    <!--/ END of CLIENT-SECTION -->

    <!-- START of MAP -->
    <x-sections.map section_heading='<span>Where</span> are we?' />
    <!--/ END of MAP -->
  
  <!-- START of FOOTER -->
  @include('home.inc.footer')
  <!--/ END of CLIENT-SECTION -->
  
<!-- START OF #BOTTOM# -->
<x-bottom />
<!--/ END of #BOTTOM# -->
