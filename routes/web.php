<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/usurio','UsurioController@lista');
Route::put('/usurio/actualizar','UsurioController@update');
Route::post('/usurio/guardar','UsurioController@store');
Route::delete('/usurio/borrar/{idusurio}', 'UsurioController@destroy');
Route::get('/usurio/buscar', 'UsurioController@show');
//Route::resource('Usurio','UsurioController');

Route::resource('usurios','UsurioController');



Route::get('/paciente','PacienteController@lista');
Route::put('/paciente/actualizar','PacienteController@update');
Route::post('/paciente/guardar','PacienteController@store');
Route::delete('/paciente/borrar/{idpaciente}', 'PacienteController@destroy');
Route::get('/paciente/buscar','PacienteController@show');

 //Route::resource('paciente','PacienteController');

 Route::resource('pacientes', 'PacienteController');


Route::get('/doctor','DoctorController@lista');
Route::put('/doctor/actualizar','DoctorController@update');
Route::post('/doctor/guardar','DoctorController@store');
Route::delete('/doctor/borrar/{iddoctor}', 'DoctorController@destroy');
Route::get('/doctor/buscar','DoctorController@show');

 //Route::resource('doctor','DoctorController');
Route::resource('doctors', 'DoctorController');


Route::get('/citasdetalle','CitasDetalleController@lista');
Route::put('/citasdetalle/actualizar','CitasDetalleController@update');
Route::post('/citasdetalle/guardar','CitasDetalleController@store');
Route::delete('/citasdetalle/borrar/{idcitasdetalle}', 'CitasDetalleController@destroy');
Route::get('/citasdetalle/buscar','CitasDetalleController@show');
Route::resource('citasdetalles', 'CitasDetalleController');


Route::get('/citas','CitasController@lista');
Route::put('/citas/actualizar','CitasController@update');
Route::post('/citas/guardar','CitasController@store');
Route::delete('/citas/borrar/{idcitas}','CitasController@destroy');
Route::get('/citas/buscar','CitasController@show');
Route::resource('cita', 'CitasController');



