<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

         if (request()->is('map')) {
          $tab = 'Map';
         } elseif (request()->is('add')) {
          $tab = 'Add Marker';
         } elseif (request()->is('markers')) {
          $tab = 'View Markers';
         } elseif (request()->is('edit/**')) {
          $tab = 'Edit Marker';
         } elseif (request()->is('search')) {
          $tab = 'Empty search field';
         } elseif (request()->is('search/**')) {
          $tab = 'Search';
         } else {
          $tab = 'Loading...';
         }

         view()->share(
          'tab', $tab,
        );
         

        Blade::directive('style', function () {
          return "<link rel=\"stylesheet\" href=\"{{asset('css/style.css')}}\" >";
        });

        Blade::directive('leafletcsscdn', function () {
          return "<link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet@1.9.4/dist/leaflet.css\" integrity=\"sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=\" crossorigin=\"\" />";
        });

        Blade::directive('leafletjscdn', function () {
          return "<script src=\"https://unpkg.com/leaflet@1.9.4/dist/leaflet.js\" integrity=\"sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=\" crossorigin=\"\"></script>";
        });        

        Blade::directive('leafletscript', function () {
          return "<script src=\"{{asset('js/leaflet.js')}}\"></script>";
        });

        Blade::directive('jquerycdn', function () {
            return "<script src=\"https://code.jquery.com/jquery-3.7.1.min.js\" integrity=\"sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=\" crossorigin=\"anonymous\"></script>";
        });

        Blade::directive('jqueryscript', function () {
          return "<script src=\"{{asset('js/jquery.js')}}\"></script>";
        });

        Blade::directive('vanillascript', function () {
          return "<script src=\"{{asset('js/vanilla.js')}}\"></script>";
        });

        Blade::if('DBUtilized', function ($marker = null) {
            return $marker;
        });


    }
}
