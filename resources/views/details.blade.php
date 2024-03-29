
<x-layout>

  <div>

    <div style="margin:20px 40px; padding:9px 12px;" class="box-shadow">

      <div>
        <a href="{{url('/markers')}}" class="text-success underline-none"><- Back</a>
      </div>

      <h2 class="text-success text-center">Marker details</h2>

      <div class="row">
        <div class="col-start" style="padding:5px;">ID</div>
        <div class="col-end text-success text-start" style="text-align:right; padding:5px;">{{$marker->id}}</div>
      </div>
      <div class="row">
        <div class="col-start" style="padding:5px;">Marker ID</div>
        <div class="col-end text-success text-start" style="text-align:right; padding:5px;">{{$marker->marker_id}}</div>
      </div>
      <div class="row">
        <div class="col-start" style="padding:5px;">Latitude</div>
        <div class="col-end text-success text-start" style="text-align:right; padding:5px;">{{$marker->lat}}</div>
      </div>
      <div class="row">
        <div class="col-start" style="padding:5px;">longitude</div>
        <div class="col-end text-success text-start" style="text-align:right; padding:5px;">{{$marker->lon}}</div>
      </div>
      <div class="row">
        <div class="col-start" style="padding:5px;">Initial zoom level</div>
        <div class="col-end text-success text-start" style="text-align:right; padding:5px;">{{$marker->init_zoom}}</div>
      </div>
      <div class="row">
        <div class="col-start" style="padding:5px;">Popup</div>
        <div class="col-end text-success text-start" style="text-align:right; padding:5px;">{{$marker->popup}}</div>
      </div>
      <div class="row">
        <div class="col-start" style="padding:5px;">Tooltip</div>
        <div class="col-end text-success text-start" style="text-align:right; padding:5px;">{{$marker->tooltip}}</div>
      </div>
      @php
        $created_at = (new DateTime($marker->created_at))->format('h:sA | F d, Y');
        $updated_at = (new DateTime($marker->updated_at))->format('h:sA | F d, Y');
      @endphp
      <div class="row">
        <div class="col-start" style="padding:5px;">Created</div>
        <div class="col-end text-success text-start" style="text-align:right; padding:5px;">{{$created_at}}</div>
      </div>
      <div class="row">
        <div class="col-start" style="padding:5px;">Last updated</div>
        <div class="col-end text-success text-start" style="text-align:right; padding:5px;">{{$updated_at}}</div>
      </div>
      
      <div style="justify-content: center; padding:20px 40px;">
        <div class="" style="margin: 6px 10px;">
          <div class="">Description</div>
          <div class="text-success text-start" style="text-align:right; padding:5px;">{{$marker->description}}</div>
        </div>
      </div>

      <div>
        <a href="{{url('/edit', $marker->id)}}" style="margin-bottom: 6px;" class="btn btn-success w-100 text-center">Edit</a>
      </div>
      

    </div>

  </div>

</x-layout>