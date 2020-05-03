<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth/login');
});

Route::resource('tarifa', 'TarifaController');
Route::resource('vehiculo', 'VehiculoController');
Route::resource('ingresoV','Ingreso_vehiculoController');
Route::resource('ticket','TicketController');
Route::get('ticket/{placa}/{id}/{valor}','TicketController@generarTicket')->name('ticket');


Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
