

<!-- footer start -->
<footer>
  <div class="container">
     <div class="row">
        <div class="col-md-4 mb-4 px-4">
            <div class="full">
              {{-- <h5 class="fw-bolder">INFO</h5> --}}
              <div class="logo_footer">
                <a href="/">
                  <img width="210" src="{{asset('home/images/logo.png')}}" alt="Logo" title="Company logo"/>
                </a>
              </div>
              <div class="information_f">

                @foreach ($website_info as $wi)
                  <p class="@php echo $wi->info!='email'? 'capitalize':null; @endphp"><strong class="uppercase">{{$wi->info}}:</strong> <span title="{{Str::ucfirst($wi->info)}}">{{$wi->value}}</span></p>
                @endforeach

              </div>
            </div>
        </div>
        <div class="col-md-8 px-4">
           <div class="row">
              <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                            <li><a class="footer-links {{$tab=='HOME'?'text-danger':null}}" href="{{route('user-home')}}" title="Home">Home</a></li>
                            <li><a class="footer-links {{$tab=='ABOUT'?'text-danger':null}}" href="{{route('about')}}" title="About">About</a></li>
                            <li><a class="footer-links {{$tab=='PRODUCT'?'text-danger':null}}" href="{{route('product')}}" title="Product">Product</a></li>
                            <li><a class="footer-links {{$tab=='TESTIMONIAL'?'text-danger':null}}" href="{{route('testimonial')}}" title="Testimonial">Testimonial</a></li>
                            <li><a class="footer-links {{$tab=='BLOG'?'text-danger':null}}" href="{{route('blog')}}" title="Blog">Blog</a></li>
                            <li><a class="footer-links {{$tab=='CONTACT'?'text-danger':null}}" href="{{route('contact')}}" title="Blog">Contact</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="widget_menu">
                          <h3>Account</h3>
                          <ul>

                              @auth

                                @if (Auth::user()->usertype != 0)
                                  <li>
                                    <a class="footer-links {{$tab=='DASHBOARD'?'text-danger':null}}" href="{{route('dashboard')}}" title="Dashboard">
                                      Dashboard
                                    </a>
                                  </li>
                                @endif
                                
                                <li><a class="footer-links {{$tab=='PROFILE'?'text-danger':null}}" href="{{route('profile.show')}}" title="Account or user profile">Profile</a></li>
                                <li><a class="footer-links {{$tab=='INVOICES'?'text-danger':null}}" href="{{url('/invoices')}}" title="Your invoices, purchases and every other financial transactions you ever carried out">Invoices</a></li>
                                <li><a class="footer-links {{$tab=='CART'?'text-danger':null}}" href="{{route('cart')}}" title="Cart">Cart</a></li>
                                <li>
                                  <form class="{{$tab=='CHECKOUT'?'text-danger':null}}" action="{{route('checkout')}}" title="Checkout" method="POST">
                                    @csrf
                                    {{-- <input type="hidden" name="final_total" value="{{$final_total}}"> --}}
                                    <input type="hidden" name="uid" value="{{Auth::user()->id}}">
                                    <button class="footer-links" type="submit">Checkout</button>
                                  </form>
                                </li>
                                <li>
                                  <x-trials.logout-btn  width="100%" text_class="footer-links {{$tab=='LOGOUT'?'text-danger':null}} d-inline" form_class="m-0 p-0" title="Logout">
                                    Logout
                                  </x-trials.logout-btn>
                                </li>
                                
                              @else

                                <li><a class="footer-links {{$tab=='LOGIN'?'text-danger':null}}" href="{{route('login')}}" title="Login">Login</a></li>
                                <li><a class="footer-links {{$tab=='REGISTER'?'text-danger':null}}" href="{{route('register')}}" title="Register">Register</a></li>
                                <li><a class="footer-links {{$tab=='FORGOT PASSWORD'?'text-danger':null}}" href="{{url('forgot-password')}}" title="Forgot password">Forgot password</a></li>

                              @endauth
                            </ul>
                        </div>
                    </div>
                  </div>
              </div>     
              <div class="col-md-5" id="newsletter">
                  <div class="widget_menu">
                    <h3>Newsletter</h3>
                    <div class="information_f">
                      <p>Subscribe to our newsletter to get our latest arrivals and more!</p>
                    </div>
                    
                    @if (session()->has('news_subscription_success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {!! session('news_subscription_success') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    @if (session()->has('news_email_exist'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {!! session('news_email_exist') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    <div class="form_sub">
                      
                        <form action="{{route('newsletter-subscription')}}" method="POST">
                          @csrf
                          <fieldset> 
                              <div class="field">
                                  <input type="hidden" name="prev_url" value="{{url(request()->path())}}">
                                  <input type="email" class="@error('news_email'){{'border border-danger box-shadow-danger'}}@enderror" placeholder="Enter Your Mail" name="news_email" title="Click to input email" value="{{old('news_email')}}" required />
                                  <input type="submit" value="Subscribe"  title="Click to subscribe to news letter containing daily updates" />
                              </div>
                              @error('news_email')
                                  <p class="text-danger">{{$message}}</p>
                              @enderror
                          </fieldset>
                        </form>

                    </div>
                  </div>
              </div>
           </div>
        </div>
     </div>
  </div>
</footer>
<!-- footer end -->


<!-- Modal -->
<div class="modal fade" id="searchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog p-3">
    <div class="modal-content">
      <div class="modal-header bg-danger text-light">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Search</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        
        <x-input type="search" class="p-2 fs-5" name="phrase" id="phrase" placeholder="Enter your search phrase..." style="font-size: 16px;" autofocus  required />
          
        <div id="search-error-container" class="m-2" style="display: none;">
          <div class="alert alert-danger mt-3">Please enter a valid search phrase.</div>
        </div>
        <div id="search-processing-container" class="m-2" style="display: none;">  
          <div class="alert alert-success mt-3 px-3">Searching...</div>
        </div>          

      </div>

      <div class="modal-footer bg-danger">
        <button type="button" id='search-trigger' class="btn btn-light text-danger">Search</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End of Modal  -->



<!-- START BOTTOM-FOOTER -->
@include('home.inc.bottom-footer')
<!-- END of BOTTOM-FOOTER -->