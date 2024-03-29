
/**
 * 
 * DATA RUNDOWN
 * 
 * @param map = Map object
 * @param osm = Open Street Map
 * @param excoord  = Exemplary Coordinates (latitude and longitude) for the center of the map
 * 
 */

var excoord1 = [4.151292,9.248059];
var excoord2 = [4.141292,9.238059];

var map = L.map('map').setView(excoord1, 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?bar', 
    {
      // foo: 'bar', 
      attribution: '&copy; <a href="' + window.location.href + '">Dhedak</a> by Braxton & Franck'
    }).addTo(map);

// Where the marker actually lies 
L.marker(excoord1)
    .bindPopup('First popup')
    .bindTooltip('First tooltip')
    .addTo(map);

L.marker(excoord2)
    .bindPopup('Second popup')
    .bindTooltip('Second tooltip')
    .addTo(map);
