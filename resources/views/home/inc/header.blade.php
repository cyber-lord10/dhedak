
{{-- 676376020 --}}

  
  @php 
  if (request()->path()=='/') 
  {
    $tab = 'HOME';
    $home_active = 'active';
  } 
  elseif (request()->path()=='product') 
  {
    $tab = 'PRODUCT';
    $product_active = 'active';
  } 
  elseif (request()->is('product_details/**')) 
  {
    $tab = 'PRODUCT DETAILS';
    $product_active = 'active';
  } 
  elseif (request()->path()=='contact') 
  {
    $tab = 'CONTACT';
    $contact_active_lg = 'active';
    $contact_active_sm = 'bg-danger text-light';
  } 
  elseif (request()->path()=='about') 
  {
    $tab = 'ABOUT';
    $about_active = 'bg-danger text-light';
  } 
  elseif (request()->path()=='testimonial') 
  {
    $tab = 'TESTIMONIAL';
    $testimonial_active = 'bg-danger text-light';
  } 
  elseif (request()->path()=='blog') 
  {
    $tab = 'BLOG';
    $blog_active = 'bg-danger text-light';
  } 
  elseif (request()->path()=='cart') 
  {
    $tab = 'CART';
    $cart_active = 'active';
  } 
  elseif (request()->path()=='checkout') 
  {
    $tab = 'CHECKOUT';
    $checkout_active = 'active';
  }
  elseif (request()->path()=='user/profile') 
  {
    $tab = 'PROFILE';
    $profile_active = 'bg-danger text-light';
  }
  elseif (request()->path()=='login') 
  {
    $tab = 'LOGIN';
    $login_active = 'active';
  } 
  elseif (request()->path()=='register') 
  {
    $tab = 'REGISTER';
    $register_active = 'active';
  }
  elseif (request()->path()=='dashboard') 
  {
    $tab = 'DASHBOARD';
    $dashboard_active = 'active';
  }
  elseif (request()->path()=='/categories' || request()->category) 
  {
    $tab = 'CATEGORIES';
    $categories_active = 'active';
  }
  elseif (request()->path()=='invoices') 
  {
    $tab = 'INVOICES';
    $invoices_active = 'bg-danger text-light';
  }
  elseif (request()->path()=='success') 
  {
    $tab = 'PAYMENT SUCCESSFUL';
    $payment_success_active = 'active';
  }
  elseif (request()->path()=='cancel') 
  {
    $tab = 'PAYMENT CANCELLED';
    $payment_cancel_active = 'active';
  }
  elseif (request()->is('email/verify')) 
  {
    $tab = 'EMAIL VERIFICATION';
    $search_active = 'text-danger';
  }
  elseif (request()->path()=='redirect') 
  {  
    $tab = 'Redirecting...';
  }
  elseif (request()->is('search/**')) 
  {
    $tab = 'SEARCH';
    $search_active = 'text-danger';
  } 
  else
  {
    $tab = 'LOADING..';
    $loading_active = 'LOADING';
  }         
@endphp

<!-- header section strats -->
<header class="header_section">
  <div class="container">
     <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{route('user-home')}}">
          <img width="150" height="35" src="{{asset('home/images/logo.png')}}" alt="Extra spare parts logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav">
              <li class="nav-item {{$home_active??false}}">
                 <a class="nav-link" href="{{route('user-home')}}" title="Home">Home <span class="sr-only">(current)</span></a>
              </li>             
              <li class="nav-item {{(isset($product_active) && !request()->category)? $product_active : false}}">
                 <a class="nav-link" href="{{route('product')}}" title="Products">Products</a>
              </li>
              <li class="nav-item hide-at-less-than-991px {{$contact_active_lg??false}}">
                 <a class="nav-link" href="{{route('contact')}}" title="Contact">Contact</a>
              </li>


              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle uppercase {{$categories_active ?? false}} {{request()->category? 'text-danger' : false}}" href="#" data-bs-toggle="dropdown" aria-expanded="false" title="Filter products by category">
                  <span id="categories" class="">
                    Categories
                  </span>
                </a>
                <ul class="custom-dropdown dropdown-menu">
                  @foreach ($nav_categories as $ncat)
                    <li class="nav-item">
                      <a class="dropdown-item capitalize 
                      {{ request()->category == $ncat->category_name? 'text-danger': false; }}" href="{{url("product?category=$ncat->category_name")}}" title="Filter by {{$ncat->category_name}}">{{$ncat->category_name}}</a>
                    </li>
                  @endforeach  
                  @if (count($nav_categories) >= 5)
                    <li class="nav-item border-top border-dark">
                      <a class="dropdown-item" href="{{url('/categories')}}">
                        See more...
                      </a>
                    </li>
                  @endif
                </ul>
              </div>


              <div class="nav-item dropdown">

                @php 
                  if 
                    (
                      request()->path()=='about' || 
                      request()->path()=='testimonial' || 
                      request()->path()=='blog'
                    ) 
                  {
                    $more_active = 'text-danger';
                  }

                  if 
                    ( 
                      request()->path()=='user/profile' || 
                      request()->path()=='invoices'
                    ) 
                  $account_active = 'text-danger';

                @endphp

                <a class="nav-link dropdown-toggle uppercase {{$more_active ?? false}}" href="#" data-bs-toggle="dropdown" aria-expanded="false" title="More">
                  <span id="more">More</span>
                </a>
                <ul class="custom-dropdown dropdown-menu">
                  <li class="nav-item show-at-less-than-991px">
                    <a class="dropdown-item {{$contact_active_sm??false}}" href="{{route('contact')}}" title="Contact">Contact</a>
                  </li>
                  <li class="">
                    <a class="dropdown-item {{$about_active??false}}" href="{{route('about')}}" title="About">About</a>
                  </li>
                  <li class="">
                    <a class="dropdown-item {{$testimonial_active??false}}" href="{{route('testimonial')}}" title="Testimonial">Testimonial</a>
                  </li>
                  <li class="">
                    <a class="dropdown-item {{$blog_active??false}}" href="{{route('blog')}}" title="Blog">Blog</a>
                  </li>
                </ul>
              </div>



              <li class="nav-item">
                <!-- Button trigger modal -->
                <button type="button" aria-hidden="true" data-bs-toggle="modal"  data-bs-target="#searchModal" class="my-2 my-sm-0 nav_search-btn" title="Search">
                  <i class="fa fa-search {{$search_active??false}}" style="font-size: 20px;"></i>
                </button>
              </li>

              <li class="nav-item {{$cart_active??false}}">
                <a class="nav-link pt-2" href="{{route('cart')}}" title="Cart">
                  <i class="fa-solid fa-cart-shopping" style="font-size: 20px;"></i>
                </a>
              </li>

              

              @if (Route::has('login'))
                
                @auth

                  <div class="nav-item dropdown">
                    
                    <a class="nav-link dropdown-toggle capitalize {{ $account_active ?? false }}" href="#" data-bs-toggle="dropdown" aria-expanded="false" title="{{Auth::user()->name . '\'(S) user actions'}}">
                      
                      <span id="account">
                        @php
                          $name = explode(' ', App\Http\Controllers\AdminController::visualizeName(Auth::user()->name, 12)); 
                          if (count($name) >= 2) 
                          {
                            $abbr = $name[0][0] . $name[1][0];
                          } elseif (count($name) == 1) 
                          {
                            $abbr = $name[0][0];
                          }

                          $url_left_section = 'https://ui-avatars.com/api/?name=';
                          $url_right_section = '&color=bd0e0e&background=f7eaea';

                          $avatar_url = $url_left_section . $abbr . $url_right_section;

                         @endphp
                        <img src="{{$avatar_url}}" alt="{{Auth::user()->name . '\'(S) account'}}" class="inline-block" width="30px" height="30px" style="border-radius: 50%;" />
                        {{App\Http\Controllers\AdminController::visualizeName(Auth::user()->name, 12)}}
                      </span>
                    </a>

                    <ul class="custom-dropdown dropdown-menu">
                      @if (Auth::user()->usertype != 0)
                        <li class="">
                          <a class="dropdown-item text-center" href="{{route('dashboard')}}" title="Visit your admin dashboard" target="_blank">Dashboard</a>
                        </li>
                      @endif
                      <li class="">
                        <a class="dropdown-item text-center {{$profile_active??false}}" href="{{route('profile.show')}}" title="Profile">Profile</a>
                      </li>
                      <li class="">
                        <a class="dropdown-item text-center {{$invoices_active??false}}" href="{{route('checkout.invoices')}}" title="Invoices">Invoices</a>
                      </li>
                      <li class="">
                        <x-trials.logout-btn width="100%" form_class="p-2" text_class="btn btn-outline-danger cursor-pointer w-100" text_style="width:80%;" title="Logout">
                          Logout
                        </x-trials.logout-btn>
                      </li>
                    </ul>
                  </div>
                  
                @else

                  @if (Route::has('register'))

                    <!-- View for large screeens -->
                    <li class="nav-item hide-at-less-than-767px">
                      <a class="nav-link btn btn-danger text-white px-3 py-2" id="login" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item hide-at-less-than-767px">
                      <a class="nav-link btn btn-outline-danger px-3 py-2 hover:text-white" id="register" href="{{route('register')}}">Register</a>
                    </li>

                    <!-- View for smaller screens -->
                    <li class="nav-item show-at-less-than-767px text-center">
                      <a class="nav-link btn px-3 py-2 ms-1 me-1 my-2 d-inline-block @php echo request()->path()=='login'? 'btn-outline-danger text-danger focus:text-red-500':'btn-outline-dark text-dark focus:text-black'; @endphp" id="login" href="{{route('login')}}">Login</a>
                      <a class="nav-link btn px-3 py-2 me-1 my-2 d-inline-block hover:text-white  @php echo request()->path()=='register'? 'btn-outline-danger text-danger focus:text-red-500':'btn-outline-dark text-dark focus:text-dark'; @endphp" id="register" href="{{route('register')}}">Register</a>
                    </li>

                  @endif
                @endauth
              @endif

              

           </ul>
        </div>
     </nav>
  </div>
</header>
<!-- end header section --> 
