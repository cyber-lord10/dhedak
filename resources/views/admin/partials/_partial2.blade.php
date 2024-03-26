<!-- partial:partials/_navbar.html -->
<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    <a class="navbar-brand brand-logo-mini" href="{{url('/')}}"><img src="{{asset('admin/assets/images/logo-mini.png')}}" alt="logo" style="width:70px; height:50px;" /></a>
  </div>
  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav w-100">
      <li class="nav-item w-100">
        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
          <input type="text" class="form-control text-light" placeholder="Search dashboard">
        </form>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown d-none d-lg-block">
        <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown" karia-expanded="false" href="#">&plus; Create</a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
          
          <h6 class="p-3 mb-0">New</h6>
          
          <div class="dropdown-divider"></div>

          @if (App\Http\Controllers\AdminController::isHighAdmin())
            <a class="dropdown-item preview-item" href="{{url('/admins')}}">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-account-circle text-warning"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1">Admin</p>
              </div>
            </a>
          @endif

          <div class="dropdown-divider"></div>

          <a class="dropdown-item preview-item" href="{{url('/products/add_product')}}">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-cart-outline text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1">Product</p>
            </div>
          </a>

          <div class="dropdown-divider"></div>

          <a class="dropdown-item preview-item" href="{{url('/view_category')}}">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="fa-solid fa-layer-group text-danger"></i> <!--  -->
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1">Category</p>
            </div>
          </a>

          <div class="dropdown-divider"></div>

          <a class="dropdown-item preview-item" href="{{url('/admin/contact')}}">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="fa-solid fa-address-card text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1">Contact</p>
            </div>
          </a>
          
          <div class="dropdown-divider"></div>

          <a class="dropdown-item preview-item" href="{{url('/admin/advert/add_advert')}}">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="fa-solid fa-rectangle-ad text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1">Advert</p>
            </div>
          </a>
          
          <div class="dropdown-divider"></div>

          <a class="dropdown-item preview-item" href="{{url('/admin/testimonial/add_testimonial')}}">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-volume-high text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1">Testimonial</p>
            </div>
          </a>

          <div class="dropdown-divider"></div>

          <p class="p-3 mb-0 text-center">Can create directly!</p>

        </div>
      </li>
      <li class="nav-item nav-settings d-none d-lg-block">
        <a class="nav-link" href="#">
          <i class="mdi mdi-view-grid"></i>
        </a>
      </li>
      <li class="nav-item dropdown border-left">
        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <i class="mdi mdi-email"></i>
          <span class="count bg-success"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
          <h6 class="p-3 mb-0">Messages</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="{{asset('admin/assets/images/faces/face4.jpg')}}" alt="image" class="rounded-circle profile-pic">
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
              <p class="text-muted mb-0"> 1 Minutes ago </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="{{asset('admin/assets/images/faces/face2.jpg')}}" alt="image" class="rounded-circle profile-pic">
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
              <p class="text-muted mb-0"> 15 Minutes ago </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="{{asset('admin/assets/images/faces/face3.jpg')}}" alt="image" class="rounded-circle profile-pic">
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
              <p class="text-muted mb-0"> 18 Minutes ago </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <p class="p-3 mb-0 text-center">4 new messages</p>
        </div>
      </li>
      <li class="nav-item dropdown border-left">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="mdi mdi-bell"></i>
          <span class="count bg-danger"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <h6 class="p-3 mb-0">Notifications</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-calendar text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Event today</p>
              <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-danger"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Settings</p>
              <p class="text-muted ellipsis mb-0"> Update dashboard </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-link-variant text-warning"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Launch Admin</p>
              <p class="text-muted ellipsis mb-0"> New admin wow! </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <p class="p-3 mb-0 text-center">See all notifications</p>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
          <div class="navbar-profile">
            @php
              $avatar_url = Auth::user()->profile_photo_url;
              $avatar_url = Str::replaceFirst('7F9CF5', 'bd0e0e', $avatar_url);
              $avatar_url = Str::replaceFirst('EBF4FF', 'f7eaea', $avatar_url);
            @endphp
            <img class="img-xs rounded-circle" src="{{$avatar_url}}" alt="">
            <p class="mb-0 d-none d-sm-block navbar-profile-name capitalize">
              {{App\Http\Controllers\AdminController::visualizeName(Auth::user()->name, 16)}}</p>
            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">

          <h6 class="p-3 mb-0">Profile</h6>

          <div class="dropdown-divider"></div>
          
          <a class="dropdown-item preview-item" href="/" target="_blank">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-web text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Website</p>
            </div>
          </a>

          <a class="dropdown-item preview-item" href="{{url('user/profile')}}">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Settings</p>
            </div>
          </a>

          <div class="dropdown-divider"></div>

          <x-trials.logout-btn form_class="mx-0" text_class="preview-subject mb-1 mx-0">
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-logout text-danger"></i>
                </div>
              </div>
              <div class="preview-item-content">Logout</div>
            </a>
          </x-trials.logout-btn>
          
          <div class="dropdown-divider"></div>
          <p class="p-3 mb-0 text-center">Advanced settings</p>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-format-line-spacing"></span>
    </button>
  </div>
</nav>