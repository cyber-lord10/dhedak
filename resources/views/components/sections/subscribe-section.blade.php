<!-- subscribe section -->
<section class="subscribe_section">
  <div class="container-fuild">
     <div class="box">
        <div class="row">
           <div class="col-md-6 offset-md-3" id="coupon">
              <div class="subscribe_form ">
                 <div class="heading_container heading_center">
                    <h3>Subscribe To Get Discount Offers</h3>
                 </div>
                 <p>Subscribe to receive our monthly coupons for free, we always offer our customers coupons every now and then.</p>
                
                 @if (session()->has('coupon_subscription_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {!! session('coupon_subscription_success') !!}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                  @if (session()->has('coupon_email_exist'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {!! session('coupon_email_exist') !!}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif

                 <form action="{{route('coupon_subscribe')}}" method="POST">
                    @csrf
                    <input type="hidden" name="prev_url" value="{{url(request()->path())}}">
                    <input name="coupon_email" type="email" class="@error('coupon_email') {{'box-shadow-danger'}} @enderror" placeholder="Enter your email" title="Email to be use for susbcription and coupon reception" required >
                    @error('coupon_email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <button type="submit" title="Subscribe">
                      subscribe
                    </button>
                 </form>

              </div>
           </div>
        </div>
     </div>
  </div>
</section>
<!-- end subscribe section -->