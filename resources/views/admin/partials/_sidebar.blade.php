

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="/redirect"><img src="{{asset('admin/assets/images/logo.png')}}" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="/redirect"><img src="{{asset('admin/assets/images/logo-mini.png')}}" alt="logob" styte="width:90px; height:50px;"/></a>
  </div>

  <ul class="nav">
    
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
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
            <img class="img-xs rounded-circle " src="{{$avatar_url}}" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal capitalize">
              {{App\Http\Controllers\AdminController::visualizeName(Auth::user()->name, 16)}}
            </h5>
            <span>
              @if (App\Http\Controllers\AdminController::isOwnerAdmin())
                {{ 'Owner Admin' }}
              @elseif (App\Http\Controllers\AdminController::isMasterAdmin())
                {{ 'Master Admin' }}
              @else 
                {{ 'Sub Admin' }}
              @endif
            </span>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-onepassword  text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-calendar-today text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
            </div>
          </a>
        </div>
      </div>
    </li>

    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{route('dashboard')}}">   
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="fa-solid fa-shop"></i>
        </span>
        <span class="menu-title">Product</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('/products/add_product')}}">Add products</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/products/view_products')}}">Show products</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/view_category')}}">
        <span class="menu-icon">
          <i class="fa-solid fa-layer-group"></i>
        </span>
        <span class="menu-title">Category</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/admin/contact')}}">
        <span class="menu-icon">
          <i class="fa-solid fa-address-card"></i>
        </span>
        <span class="menu-title">Contact</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#adverts" aria-expanded="false" aria-controls="auth">
        <span class="menu-icon">
          <i class="fa-solid fa-rectangle-ad"></i>
        </span>
        <span class="menu-title">Advert</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="adverts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/advert/add_advert')}}">Create advert</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/advert/view_adverts')}}">View adverts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/advert/documentation')}}">Documentation</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#testimonials" aria-expanded="false" aria-controls="auth">
        <span class="menu-icon">
          <i class="mdi mdi-volume-high"></i> <!-- mdi mdi-vibrate -->
        </span>
        <span class="menu-title">Testimonial</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="testimonials">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/testimonial/add_testimonial')}}">Create testimonial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/testimonial/view_testimonials')}}">View testimonials</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/testimonial/change_testimonial_position')}}">Change positions</a>
          </li>
        </ul>
      </div>
    </li> 

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/admins')}}">
        <span class="menu-icon">
          <i class="mdi mdi-account-multiple-outline"></i> 
        </span>
        <span class="menu-title">Admin</span>
      </a>
    </li>

    {{-- <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/documentation')}}">
        <span class="menu-icon">
          <i class="mdi mdi-file-document-box"></i>
        </span>
        <span class="menu-title">Documentation</span>
      </a>
    </li> --}}

    <li class="nav-item menu-items" style="border-top-color: grey; border-top-style: solid; border-top-width: 2px;">
      <a class="nav-link" href="{{url('/')}}" target="_blank">
        <span class="menu-icon">
          <i class="fa-solid fa-globe"></i>
        </span>
        <span class="menu-title">Visit website</span>
      </a>
    </li>

    

    {{-- <li class="nav-item menu-items">
      <a class="nav-link" href="pages/tables/basic-table.html">
        <span class="menu-icon">
          <i class="mdi mdi-table-large"></i>
        </span>
        <span class="menu-title">Tables</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="pages/charts/chartjs.html">
        <span class="menu-icon">
          <i class="mdi mdi-chart-bar"></i>
        </span>
        <span class="menu-title">Charts</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="pages/icons/mdi.html">
        <span class="menu-icon">
          <i class="mdi mdi-contacts"></i>
        </span>
        <span class="menu-title">Icons</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <span class="menu-icon">
          <i class="mdi mdi-security"></i>
        </span>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="#">
        <span class="menu-icon">
          <i class="mdi mdi-file-document-box"></i>
        </span>
        <span class="menu-title">Documentation</span>
      </a>
    </li> --}}
  </ul>
</nav>