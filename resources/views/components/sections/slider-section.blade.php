 
 <!-- slider section -->
 <section class="slider_section ">

  <div class="slider_bg_box">
     <img src="{{asset('home/images/slider-bg-2.png')}}" alt="">
  </div>

  <div id="bannerCarousel" class="carousel slide px-4" data-ride="carousel">
     <div class="carousel-inner">


        <!-- First initial carousel item -->

        {{-- <div class="carousel-item active">
           <div class="container ">
              <div class="row">
                 <div class="col-md-7 col-lg-6 ">
                    <div class="detail-box">
                       <h1>
                          <span>
                          Sale 15-20% Off
                          </span>
                          <br>
                          On Everything
                       </h1>
                       <p>
                          We offer a <span class="badge badge-danger">15% discount</span> to all our customers of single purchase above <span class="badge badge-danger">$1000</span> and we even go right up to a <span class="badge badge-danger">20% discount</span> for purchases over <span class="badge badge-danger">$5000</span>,that's to show our appreciation and love for valued customers. The discounts are forever and will never expire.
                       </p>
                       <div class="btn-box">
                          <a href="{{route('product')}}" class="btn1">
                            Shop Now
                          </a>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div> --}}


        <!-- Second initial carousel item -->

        {{-- <div class="carousel-item ">
           <div class="container ">
              <div class="row">
                 <div class="col-md-7 col-lg-6 ">
                    <div class="detail-box">
                       <h1>
                          <span>
                          Free deliveries
                          </span>
                          <br>
                          Worldwide
                       </h1>
                       <p>
                          we've been doing <span class="badge badge-danger">free</span> deliveries for so many customers of ours for a very <span class="text-danger">long time</span>, that's ever since our existence in the market, ou can see our for your self below, no more <span class="line-through">high cost</span> delivery fees for you...
                       </p>
                       <div class="btn-box">
                          <a href="{{route('product')}}" class="btn1">
                            Shop Now
                          </a>
                       </div>
                    </div>
                 </div>
              </div>
           </div> 
        </div> --}}


        <!-- Third initial carousel item -->

        {{-- <div class="carousel-item">
           <div class="container ">
              <div class="row">
                 <div class="col-md-7 col-lg-6 ">
                    <div class="detail-box">
                       <h1>
                          <span>
                          Award offerings
                          </span>
                          <br>
                          Regularly 
                       </h1>
                       <p>
                          We offer awards to the most active customers in our database <italics>(that's those who's purchase per week are above <bold>$2000</bold>)</italics>, those awards entail <badge>gift cards</badge>, <badge>free purchase</badge> to some of products, and others some <badge>job opportunites</badge>, regardless of your <bold>geographical location</bold>.
                       </p>
                       <div class="btn-box">
                          <a href="{{route('testimonial')}}" class="btn1">
                            Testimonial
                          </a>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div> --}}

        {{-- @dd($adverts) --}}

        @php $counter = 0; @endphp
        @foreach ($adverts as $advert)
          <div class="carousel-item {{$counter==0? 'active':null}}">
            <div class="container ">
              <div class="row">
                  <div class="col-md-7 col-lg-6 ">
                    <div class="detail-box">
                        <h1 class="capitalize">
                          <span>
                            {{$advert->title}}
                          </span>
                          <br>
                          {{$advert->subtitle}}
                        </h1>
                        <p class="text-shadow-light-grey">
                          {!! $advert->text !!}
                        </p>
                        <div class="btn-box">
                          <a href="{{url($advert->href)}}" class="btn1 capitalize">
                            {{$advert->link_text}}
                          </a>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          @php $counter++ @endphp
        @endforeach


     </div>
     <div class="container">
        <ol class="carousel-indicators">
          @php $counter = 0; @endphp
          @foreach ($adverts as $advert)            
            <li data-target="#bannerCarousel" data-slide-to="{{$counter}}" class="{{$counter==0? 'active':null}}"></li>
            @php $counter++ @endphp
          @endforeach
        </ol>
     </div>
  </div>
</section>
<!-- end slider section -->