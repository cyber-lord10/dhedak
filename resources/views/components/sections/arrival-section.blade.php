
<!-- arrival section -->
<section class="arrival_section">
  {{-- <div class="container"> --}}
     <div class="box">
      
        <div class="arrival_bg_box">
           <img src="{{asset('home/images/arrival-bg.png')}}" alt="">
        </div>
        
        
        <div class="row">
           <div class="col-md-6 ml-auto arrival-text-content">
              <div class="heading_container">
                 <h2>
                    #NewArrivals
                 </h2>
              </div>
              <p style="margin-top: 20px; margin-bottom: 30px;">
                 We just checked in some <span class="badge badge-danger">new goods</span> into our warehouse and we are letting the public know they've arrived, you can now start placing your orders add to <a class="underline text-danger" style="background-color:inherit; display:inline; padding:0; color:inherit; border:none;" href="{{url('/cart')}}">cart</a>.
              </p>
              <a href="{{url('/product')}}">
              View Now
              </a>
           </div>
        </div>
        
     </div>
  {{-- </div> --}}
</section>
<!-- end arrival section -->