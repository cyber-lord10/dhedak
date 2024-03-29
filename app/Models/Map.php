<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $attributes = [
      'init_zoom' => 13,
    ];

    protected $fillable = [
      'marker_id',
      'lat',
      'lon',
      'init_zoom',
      'popup',
      'tooltip',
      'description',
    ];
}
