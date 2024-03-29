
<x-layout>

  <div>
    <div>
      <div style="">
        <form id="searchForm" style="padding: 6px 10px;">
          <input type="search" class="d-inline-block text-success" id="search" name="search" style=" width:calc(100% - 90px); padding:6px 9px; border-radius:7px; height:40px; font-size:22px; border:2px solid green;" value="{{$phrase??false}}" autofocus />
          <input type="submit" class="d-inline-block btn btn-success" value="Search"  style="padding:0 7px; font-size:19px; height:45px;">          
        </form>
      </div>
      <p class="search-error text-red-500 px-4" style="display: none;">Please write phrase to search for!</p>
    </div>

    <div>

      <div style="overflow-x: auto;">

        <table id="markers-table" class="w-100">

          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Marker ID</th>
            <th class="text-center">Latitude</th>
            <th class="text-center">Longitude</th>
            {{-- <th class="text-center">Initial zoom</th> --}}
            <th></th>
          </tr>

          @php $counter = 0; @endphp

          @forelse ($markers as $marker)
            
            @php $counter++; @endphp

            <tr title="{{$marker->tooltip}}">
              <td class="text-center">{{$counter}}</td>
              <td class="text-end">{{$marker->marker_id}}</td>
              <td class="text-end">{{$marker->lat}}</td>
              <td class="text-end">{{$marker->lon}}</td>
              {{-- <td class="text-end">{{$marker->init_zoom}}</td> --}}
              <td class="text-center">
                
                <a href="{{url('/edit', $marker->id)}}" style="margin-bottom: 6px;" class="btn btn-success">Edit</a>
                
                <form id="deleteForm{{$marker->id}}" class="d-inline-block" action="{{url('/remove', $marker->id)}}" method="post" style="margin-bottom: 6px;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Remove</button>
                </form> 

                <a href="{{url('/markers', $marker->id)}}" class="btn btn-warning" style="margin-bottom: 6px;">Details</a>
              
              </td>
            </tr>

          @empty

            <tr>
              <td colspan="7" class="text-danger" style="background-color:rgb(254, 203, 203); padding:35px 40px; text-align:center; font-size:40px; margin: 0; border:1px solid red;">
                @if (request()->is('search/**'))
                  No match!
                @elseif (request()->is('markers'))
                  No markers yet!
                @endif
              </td>
            </tr>
            
          @endforelse

        </table>

      </div>   

      <div class="p-3">
        {!! $markers->links() !!}
      </div>

    </div>
  </div>


  <x-markers-loop :markers="$markers" />


</x-layout>