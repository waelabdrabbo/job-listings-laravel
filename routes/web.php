<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/user/{id}', function ($id){
    return response("USER ID IS:" . $id);
});

// Get All Listing
Route::get('/', [ListingController::class, 'index']);


// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);

// Show Edit From

Route::get('listings/{listing}/edit', [ListingController::class, 'edit']);

// Update Lisitng Item

Route::put('/listings/{listing}', [ListingController::class , 'update']);

// Delete Lisitng Item

Route::delete('/listings/{listing}', [ListingController::class , 'destroy']);

// Get Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);