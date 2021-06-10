<?php

use Illuminate\Support\Facades\Route;
use App\Models\Reservation;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('top');
    //
});
Route::post('/reservation', function (Request $request) {
    $reservation = new Reservation();
    $reservation->user = $_POST['user'];
    $reservation->count = $_POST['count'];
    $reservation->datetime = $_POST['date_val'];
    $reservation->save();
    return view('reservation');

});
Route::delete('/reservation/{reservation}', function () {
    //
});
