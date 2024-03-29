
<x-layout>

  <div id="map"></div>

</x-layout>


<x-leaflet-js-map map_origin_lat="7.369722" map_origin_lon="12.354722" markers_page="{{url('/markers')}}" >

  @foreach ($markers as $marker)
    L.marker([{{$marker->lat}}, {{$marker->lon}}])
    .bindPopup('{{$marker->popup}}')
    .bindTooltip('{{$marker->tooltip}}') 
    .addTo(map);

    L.circle([{{$marker->lat}}, {{$marker->lon}}], {
      color: 'rgb(102, 170, 102)', 
      fillColor: 'rgb(82, 150, 82)', 
      fillRadius: 0.5,
      radius: 5000
    })  
    .addTo(map);
  @endforeach      

</x-leaflet-js-map>