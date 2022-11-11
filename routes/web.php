<?php

use Illuminate\Support\Facades\Route;
//use frontside controller
use App\Http\Controllers\frontsite\LandingController;
use App\Http\Controllers\frontsite\AppointmentController;
use App\Http\Controllers\frontsite\PaymentController;
use Illuminate\Auth\Events\Verified;

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

Route::resource('/', LandingController::class);


Route::group(['prefix' => 'backsite', 'as' => 'backsite.' , 'middleware' => ['auth:sanctum','verified']], 
function () {
    // return view('backsite.dashboard');

    //appointment pages
    Route::resource('Appointment', AppointmentController::class);

    //payment pages
    Route::resource('payment', PaymentController::class);
});


// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
