
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
         Payment <span>Success</span>
      </h2>
    </div>
   
    <div class="alert alert-success border-left border-success">
      <h3 class="p-4 text-center m-2">Payment was <b>successfully</b> made!</h3>
    </div>

    <div class="text-center my-2">
      <p class="p-2">Check your email (<b class="text-danger">{{Auth::user()->email}}</b>) for all the complete information about your paid <a href="{{url('/invoices')}}" class="fw-bolder text-danger underline">invoices</a>, if any further doubts you can reply to the email directly.</p>
    </div>
       
  </div>

  
  <!-- START of FOOTER -->
  @include('home.inc.footer')
  <!--/ END of CLIENT-SECTION -->
  
<!-- START OF #BOTTOM# -->
<x-bottom />
<!--/ END of #BOTTOM# -->

