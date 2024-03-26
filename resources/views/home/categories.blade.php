
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
  <div class="row">
    <div class="heading_container heading_center">
      <h2>
         Category <span>Filter</span>
      </h2>
   </div>
    <h3 class="text-center">Filter by...</h2>
   
      @foreach ($categories as $cat)
      <div class="col-6 mb-3 mx2 text-center">
        <a class="m-3 bg-danger text-light rounded-12px d-block d-flex justify-content-center align-items-center fs-4 text-center h-100 capitalize" style="padding: 30px;" href="{{url('/product?category=' . $cat->category_name)}}">
          {{$cat->category_name}}
        </a>
      </div>
    @endforeach   
     
  </div>

  
  <!-- START of FOOTER -->
  @include('home.inc.footer')
  <!--/ END of CLIENT-SECTION -->
  
<!-- START OF #BOTTOM# -->
<x-bottom />
<!--/ END of #BOTTOM# -->

