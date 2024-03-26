
<!-- START of #TOP# -->
<x-top />
<!-- END OF #BOTTOM# -->

    <!-- START of header -->
    @include('home.inc.header')
    <!--/ END of header section -->


  
  <!-- PAGE SECTIONS -->
  <div class="row">
    
    <div class="heading_container heading_center">
      <h2>
         Payment <span>Cancel</span>
      </h2>
    </div>
   
    <div class="alert alert-warning border-left border-warning">
      <h3 class="p-4 text-center m-2">Payment was cancelled entirely!</h3>
    </div>

    <div class="text-center my-2">
      <p class="p-2">Please contact the support team or contact us for assitance at <a href="{{url('/contact')}}" class="text-danger underline">contact.</a></p>
    </div>
       
  </div>

  
  <!-- START of FOOTER -->
  @include('home.inc.footer')
  <!--/ END of CLIENT-SECTION -->
  
<!-- START OF #BOTTOM# -->
<x-bottom />
<!--/ END of #BOTTOM# -->

