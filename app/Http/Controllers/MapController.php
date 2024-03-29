<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class MapController extends Controller
{
    


  // string $action, int $marker_id, array $marker_data
  private function jsonify(string $action = null, int $marker_id = 0, array $marker_data = []) 
  {

    if ($action === 'create') 

    {
      $array_data = [
        'action' => 'create',
        'data' => [
          'marker_id' => $marker_id,
          'lat' => $marker_data['lat'],
          'lon' => $marker_data['lon'],
          'init_zoom' => $marker_data['init_zoom'],
          'popup' => $marker_data['popup'],
          'tooltip' => $marker_data['tooltip'],
          'description' => $marker_data['description'], 
        ]
      ];
      
      $new_marker = json_encode($array_data);
      
      return $new_marker;

    } 

    elseif ($action === 'update') 

    {
      $array_data = [
        'action' => 'update',
        'data' => [
          'marker_id' => $marker_id,
          'lat' => $marker_data['lat'],
          'lon' => $marker_data['lon'],
          'init_zoom' => $marker_data['init_zoom'],
          'popup' => $marker_data['popup'],
          'tooltip' => $marker_data['tooltip'],
          'description' => $marker_data['description'], 
        ]
      ];
      
      $new_marker = json_encode($array_data);
      
      return $new_marker;

    } 

    elseif ($action === 'delete') 

    {
      $array_data = [
        'action' => 'delete',
        'data' => [
          'marker_id' => $marker_id,
        ]
      ];
      
      $new_marker = json_encode($array_data);
      
      return $new_marker;

    }




  }



  public function mongoDB(Request $request)
  {
    $json = $request->json;
    // dd($json);
    return view('mongodb', compact('json'));
  }




  public function map()
  {
    $markers = Map::all();
    return view('map', compact('markers'));
  }



  public function add()
  {
    return view('add');
  }



  public function addMarker(Request $request)
  {

    // validate form data

    if ($request->init_zoom)    // Checking if any value was assigned to the initial 
                                // zoom input field (so as to wlak around laravel's errors/bugs)
    {
      $marker = $request->validate([
        'marker_id' => ['required', Rule::unique('maps', 'marker_id')], 
        'lat' => 'required|numeric',
        'lon' => 'required|numeric',
        'init_zoom' => 'integer',
        'popup' => 'nullable|string',
        'tooltip' => 'nullable|string',
        'description' => 'nullable|string', 
      ]);
    }
    else 
    {
      $marker = $request->validate([
        'marker_id' => ['required', Rule::unique('maps', 'marker_id')], 
        'lat' => 'required|numeric',
        'lon' => 'required|numeric',
        'popup' => 'nullable|string',
        'tooltip' => 'nullable|string',
        'description' => 'nullable|string', 
      ]);
    }

    // Create new marker and save it to the database.
    Map::create($marker);

    // Calling the mongoDB() function to save the same data to the mongo DB database as well, so as to get equal data contents in both DBs (MySQL & MongoDB).
    // $json = $this->jsonify('create', $request->marker_id, $request->except('_token')); 

    // return redirect('/mongodb?json=' . $json); 

    return redirect()->route('markers');
  }




  public function markers()
  {
    $markers = Map::latest()->paginate(5);
    return view('markers', compact('markers'));
  }
  



  public function searchEmpty()
  {
    return view('search-empty');
  }



  public function edit(Map $marker)
  {
    return view('edit', compact('marker'));
  }



  public function editMarker(Request $request, Map $marker)
  {

    if ($request->init_zoom)    // Checking if any value was assigned to the initial 
                                // zoom input field (so as to wlak around laravel's errors/bugs)
    {
    $data = $request->validate([
    'lat' => 'required|numeric',
    'lon' => 'required|numeric',
    'init_zoom' => 'integer',
    'popup' => 'nullable|string',
    'tooltip' => 'nullable|string',
    'description' => 'nullable|string', 
    ]);
    }
    else 
    {
    $data = $request->validate([
    'lat' => 'required|numeric',
    'lon' => 'required|numeric',
    'popup' => 'nullable|string',
    'tooltip' => 'nullable|string',
    'description' => 'nullable|string', 
    ]);
    }

    // Update record in the database with new data from form fields.
    $marker->update($data);

    // Calling the jsonify() method to convert the associate array to JSON
    // $json = $this->jsonify('update', $marker->marker_id, $request->except('_token')); 

    // return redirect('/mongodb?json=' . $json); 

    return redirect()->route('markers');
  }



  public function remove(Map $marker)
  {
    $marker->delete();

    // Calling the jsonify() method to convert the associate array to JSON
    // $json = $this->jsonify(action: 'delete', marker_id: $marker->marker_id); 

    // return redirect('/mongodb?json=' . $json); 

    return redirect()->route('markers');
  }



  public function markerDetails(Map $marker)
  {
    return view('details', compact('marker'));
  }



  public function search($phrase)
  {
    $markers = Map::where('marker_id', 'LIKE', "%$phrase%")
                    ->orWhere('lat', 'LIKE', "%$phrase%")
                    ->orWhere('lon', 'LIKE', "%$phrase%")
                    ->orWhere('init_zoom', 'LIKE', "%$phrase%")
                    ->orWhere('popup', 'LIKE', "%$phrase%")
                    ->orWhere('tooltip', 'LIKE', "%$phrase%")
                    ->orWhere('description', 'LIKE', "%$phrase%")
                    ->orWhere('created_at', 'LIKE', "%$phrase%")
                    ->orWhere('updated_at', 'LIKE', "%$phrase%")
                    ->latest()
                    ->paginate(5);

    return view('markers', compact('markers', 'phrase'));

  }


  // public function trial() 
  // {
  //   $array = [
  //     'action' => 'create',
  //     'data' => [
  //       'marker_id' => 14267,
  //       'lat' => 7.737873,
  //       'lon' => 4.678102,
  //       'init_zoom' => 12,
  //       'popup' => 'My first popup',
  //       'tooltip' => 'My first tooltip',
  //       'description' => 'My first description, Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam temporibus quod cumque possimus sed mollitia nihil hic, atque voluptate error laboriosam fugit officiis quia suscipit quo sit vitae ab ipsam.' 
  //     ]
  //   ];
  
  //   $json = json_encode($array);
  
  //   return view('trial', compact('json'));
  // }




}
