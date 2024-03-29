
@props(['map_origin_lat', 'map_origin_lon', 'markers_page'])

<script>

  /**
   * 
   * DATA RUNDOWN
   * 
   * @param map = Map object
   * @param coord  = Coordinates (latitude and longitude) for the center of the map
   * 
   */
  
  var coord = [{{$map_origin_lat}}, {{$map_origin_lon}}];
  
  var map = L.map('map').setView(coord, 11);
  
  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?bar', 
      {
        // foo: 'bar', 
        attribution: '&copy; <a href="' + '{{$markers_page}}' + '">Dhedak</a> by Braxton & Franck'
      }).addTo(map);



      {{$slot}}
      


      
  </script>