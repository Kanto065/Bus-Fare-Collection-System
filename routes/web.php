<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\BusOwnerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AddBusController;
use App\Http\Middleware\ValidUser;
use GuzzleHttp\Middleware;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('Login');
})->name('log.in');

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/login', function () {
    return view('Login');
})->name('log.in');

Route::get('/logout', [LoginController::class, 'LogOut'])->name('logout');

Route::get('/passenger', [RegistrationController::class, 'passengerRegister'])->name('passenger-registration');
Route::post('/passenger', [RegistrationController::class, 'PassengerRegisterSubmit'])->name('passenger-registration');

Route::get('/owner', [RegistrationController::class, 'ownerRegister'])->name('owner-registration');
Route::post('/owner', [RegistrationController::class, 'ownerRegisterSubmit'])->name('owner-registration');

Route::post('login-user', [LoginController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('passenger')->middleware('ValidUser');
Route::get('/ownerdash', [LoginController::class, 'ownerdash'])->middleware('ValidUser');


Route::get('/password/forget', [LoginController::class, 'showForgetForm'])->name('forget-password-form');
Route::post('/password/forget', [LoginController::class, 'sendResetLink'])->name('forget-password-link');

Route::get('/admin', [LoginController::class, 'admin']);

Route::get('/Add-Bus', [AddBusController::class, 'busAdd'])->name('BusAdd')->middleware('ValidUser');
Route::post('/Add-Bus', [AddBusController::class, 'BusRegisterSubmit'])->name('addBus')->middleware('ValidUser');

Route::get('/view-route', [BusOwnerController::class, 'viewRoute'])->name('routeList');
Route::get('/view-bus', [BusOwnerController::class, 'viewBus'])->name('busList');
Route::get('/ownerdash', [BusOwnerController::class, 'ownerdash'])->name('ownerdash');
Route::get('bus_delete/{id}',[BusOwnerController::class, 'delete']);
Route::get('bus_update/{id}',[BusOwnerController::class, 'update']);
Route::post('/bus_update',[BusOwnerController::class, 'BusUpdateSubmitted'])->name('bus_update');