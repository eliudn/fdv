<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Pesona
Route::get('persons','App\Http\Controllers\PersonController@getPerson');
Route::get('person/{id}','App\Http\Controllers\PersonController@getPersonId');
Route::post('addPerson','App\Http\Controllers\PersonController@addPerson');
Route::put('updatePerson','App\Http\Controllers\PersonController@updatePerson');

//sede area
Route::get('Sedes','App\Http\Controllers\SedeController@getSede');
Route::get('Sede/{id}','App\Http\Controllers\SedeController@getSedeId');
Route::post('addSede','App\Http\Controllers\SedeController@addSede');
Route::put('updateSede','App\Http\Controllers\SedeController@updateSede');

Route::get('Areas','App\Http\Controllers\SedeController@getArea');
Route::get('Area/{id}','App\Http\Controllers\SedeController@getAreaId');
Route::post('addArea','App\Http\Controllers\SedeController@addArea');
Route::put('updateArea','App\Http\Controllers\SedeController@updateArea');

// Localisacion
Route::get('region','App\Http\Controllers\LocationController@getDepartaments');
Route::get('region/{id}','App\Http\Controllers\LocationController@getDepartamentId');


Route::get('documentType','App\Http\Controllers\LocationController@getDocumentType');

// Empleado
Route::get('employees','App\Http\Controllers\EmployeeController@getEmployee');
Route::get('employees/{id}','App\Http\Controllers\EmployeeController@getEmployeeId');
Route::post('addEmployees','App\Http\Controllers\EmployeeController@addEmployee');
Route::get('updateEmployees','App\Http\Controllers\EmployeeController@updateEmploye');

Route::post('addPersonEmployees','App\Http\Controllers\EmployeeController@addPersonaEmpleado');
