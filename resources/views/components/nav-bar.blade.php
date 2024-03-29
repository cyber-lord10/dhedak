
@php
  $active = 'bg-success text-wheat';
  if (request()->is('map')) 
  {
    $map_active = $active;
  } 
  elseif (request()->is('add')) 
  {
    $add_active = $active;
  }  
  elseif (request()->is('edit/**')) 
  {
    $markers_active = $active;
  } 
  elseif (request()->is('search')) 
  {
    $markers_active = $active;
  }
  elseif (request()->is('search/**')) 
  {
    $markers_active = $active;
  }
  elseif (request()->is('markers')) 
  {
    $markers_active = $active;
  } 
  else {
    $map_active = $active;
  }
@endphp

<nav>
  <div>
    <div>
      <ul class="list-container">
        <li class="menu-list">
          <a class="menu-anchor {{$map_active??false}}" href="{{url('/map')}}">Map</a>
        </li>
        <li class="menu-list">
          <a class="menu-anchor {{$add_active??false}}" href="{{url('/add')}}">Add marker</a>
        </li>
        <li class="menu-list">
          <a class="menu-anchor {{$markers_active??false}}" href="{{url('/markers')}}">View markers</a>
        </li>
      </ul>
    </div>
  </div>
</nav>