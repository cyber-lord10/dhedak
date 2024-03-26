
@props(['testimonials'])

<!-- client section -->
<section class="client_section layout_padding">
  <div class="container">
     <div class="heading_container heading_center">
        <h2>
           Customer's <span>Testimonial</span>
        </h2>
     </div>
     <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
           
          @foreach ($testimonials as $key => $test)

            <div class="carousel-item {{$key+1==1?'active':null}}">
              <div class="box col-lg-10 mx-auto border rounded-10px border border-danger bg-red-50"> 
                 <div class="img_container pt-4">
                    <div class="img-box">
                       <div class="img_box-inner">
                          <img src="{{asset($test->image)}}" 
                               alt="{{$test->testifier_name . '\'(s) testimonial'}}" 
                               title="{{$test->testifier_name . '\'(s) testimonial'}}" >
                       </div>
                    </div>
                 </div>
                 <div class="detail-box">
                    <h5 class="uppercase text-danger"> 
                       {{$test->testifier_name}}
                    </h5>
                    <h6 class="mb-3">
                      {{$test->testifier_occupation}}
                    </h6>
                    <p class="text-">
                       "{{$test->testimonial}}"
                    </p>
                 </div>
              </div>
            </div>

          @endforeach
           
        </div>
        <div class="carousel_btn_box">
           <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
           <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
           <span class="sr-only">Previous</span>
           </a>
           <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
           <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
           <span class="sr-only">Next</span>
           </a>
        </div>
     </div>
  </div>
</section>
<!-- end client section -->