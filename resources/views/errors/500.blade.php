
<!-- START of #TOP# -->
<x-top />
<!-- END OF #BOTTOM# -->

    <!-- START of header -->
    @include('home.inc.header')
    <!--/ END of header section -->

  
  <!-- PAGE SECTIONS -->
    


      
    <!-- 500-SECTION -->
      <div class="container text-center w-100 mt-4 mb-5">
        <h1 class="text-danger text-center p-0 m-0" style="font-size:220px;">500</h1>
        <h3 style="font-size:40px;" class="text-center p-0 mt-n5">Server error</h3>
        <div class="text-center my-5 w-100">
          <a href="/" class="btn btn-lg btn-danger p-3 mx-1" style="width: 140px; font-size:25px;">
            <i class="fa-sharp fa-solid fa-house-chimney pe-1"></i>
            Home
          </a>
          <a href="/product" class="btn btn-lg btn-danger p-3 mx-1" style="width: 140px; font-size:25px;">
            <i class="fa-solid fa-cart-shopping pe-1"></i>
            Product
          </a>
        </div>
      </div>
    <!-- end 500-SECTION -->



  
  <!-- START of FOOTER -->
  @include('home.inc.footer')
  <!--/ END of CLIENT-SECTION -->
  
<!-- START OF #BOTTOM# -->
<x-bottom />
<!--/ END of #BOTTOM# -->

