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
    request()->validate(
        [
            'user' => 'required'
        ],
        [
            'user.required' => '名前を入力してください。',

        ]
    );
    request()->validate(
        [
            'email' => 'required'
        ],
        [
            'email.required' => 'メールアドレスを入力してください。',

        ]
    );
    request()->validate(
        [
            'date' => 'required'
        ],
        [
            'date.required' => '日付を選んでください。',

        ]
    );
    request()->validate(
        [
            'count' => 'required'
        ],
        [
            'count.required' => '人数を選んでください。',

        ]
    );


    $reservation = new Reservation();
    $reservation->user = $_POST['user'];
    $reservation->email = $_POST['email'];
    $reservation->count = $_POST['count'];
    $reservation->datetime = $_POST['date'];
    $reservation->save();
    return view('reservation');

});
Route::delete('/reservation/{reservation}', function () {
    //
});
