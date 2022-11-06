<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\BusOwnerController;
use App\Http\Controllers\LoginController;
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

Route::get('/passenger', [RegistrationController::class, 'passengerRegister'])->name('passenger-registration');
Route::post('/passenger', [RegistrationController::class, 'PassengerRegisterSubmit'])->name('passenger-registration');

Route::get('/owner', [RegistrationController::class, 'ownerRegister'])->name('owner-registration');
Route::post('/owner', [RegistrationController::class, 'ownerRegisterSubmit'])->name('owner-registration');

Route::post('login-user', [LoginController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('passenger');
Route::get('/ownerdash', [LoginController::class, 'ownerdash']);

Route::get('/Add-Bus', [BusOwnerController::class, 'busAdd'])->name('addBus');