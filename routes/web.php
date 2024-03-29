<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::permanentRedirect('/', '/map');

// Route::get('/version', fn () => phpinfo()); // For development purposes

Route::get('/map', [MapController::class, 'map'])->name('map');

Route::get('/add', [MapController::class, 'add'])->name('add');

Route::post('/add-marker', [MapController::class, 'addMarker'])->name('add-marker');

Route::get('/markers', [MapController::class, 'markers'])->name('markers');

Route::get('/edit/{marker}', [MapController::class, 'edit'])->name('edit');

Route::put('/edit-marker/{marker}', [MapController::class, 'editMarker'])->name('edit-marker');

Route::delete('/remove/{marker}', [MapController::class, 'remove'])->name('remove');

Route::get('/markers/{marker}', [MapController::class, 'markerDetails'])->name('markerDetails');

Route::get('/trial', [MapController::class, 'trial']);

Route::get('/mongodb', [MapController::class, 'mongoDB'])->name('mongodb');


/* This is no search route, but simply to avoid the possibility of a 
user accessing the URL and not putting in any character after the "/search/", 
because in laravel that will render an error, laravel is going to think the 
intended link was "/search" and not "/search/{some phrase or string}" thus 
rendering an error, and undefined variables on the client */
Route::get('/search', [MapController::class, 'searchEmpty'])->name('search-empty'); 


Route::get('/search/{phrase}', [MapController::class, 'search'])->name('search');