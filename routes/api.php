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
Route::post('Person','App\Http\Controllers\PersonController@addPerson');
Route::put('Person','App\Http\Controllers\PersonController@updatePerson');

//sede area
Route::get('sedes','App\Http\Controllers\SedeController@getSede');
Route::get('sede/{id}','App\Http\Controllers\SedeController@getSedeId');
Route::post('sede','App\Http\Controllers\SedeController@addSede');
Route::put('sede','App\Http\Controllers\SedeController@updateSede');

Route::get('areas','App\Http\Controllers\SedeController@getArea');
Route::get('area/{id}','App\Http\Controllers\SedeController@getAreaId');
Route::post('area','App\Http\Controllers\SedeController@addArea');
Route::put('area','App\Http\Controllers\SedeController@updateArea');

// Localisacion
Route::get('region','App\Http\Controllers\LocationController@getDepartaments');
Route::get('region/{id}','App\Http\Controllers\LocationController@getDepartamentId');


Route::get('document_type','App\Http\Controllers\LocationController@getDocumentType');

// Empleado
Route::get('employees','App\Http\Controllers\EmployeeController@getEmployee');
Route::get('employee/{id}','App\Http\Controllers\EmployeeController@getEmployeeId');
//Route::post('Employees','App\Http\Controllers\EmployeeController@addEmployee');
Route::get('employees','App\Http\Controllers\EmployeeController@updateEmploye');
Route::post('employee','App\Http\Controllers\EmployeeController@addPersonaEmpleado');
