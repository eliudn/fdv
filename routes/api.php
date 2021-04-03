<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
// Pesona
Route::get('person','App\Http\Controllers\PersonController@getPerson');
Route::get('person/{id}','App\Http\Controllers\PersonController@getPersonId');
Route::post('Person','App\Http\Controllers\PersonController@addPerson');
Route::put('Person','App\Http\Controllers\PersonController@updatePerson');

//sede area
Route::get('sede','App\Http\Controllers\SedeController@getSede');
Route::get('sede/{id}','App\Http\Controllers\SedeController@getSedeId');
Route::post('sede','App\Http\Controllers\SedeController@addSede');
Route::put('sede','App\Http\Controllers\SedeController@updateSede');

Route::get('area','App\Http\Controllers\SedeController@getArea');
Route::get('area/{id}','App\Http\Controllers\SedeController@getAreaId');
Route::post('area','App\Http\Controllers\SedeController@addArea');
Route::put('area','App\Http\Controllers\SedeController@updateArea');

// Localisacion
Route::get('region','App\Http\Controllers\LocationController@getDepartaments');
Route::get('region/{id}','App\Http\Controllers\LocationController@getDepartamentId');


Route::get('document_type','App\Http\Controllers\LocationController@getDocumentType');

// Empleado
Route::get('employee','App\Http\Controllers\EmployeeController@getEmployee');
Route::get('employee/{id}','App\Http\Controllers\EmployeeController@getEmployeeId');
//Route::post('Employees','App\Http\Controllers\EmployeeController@addEmployee');
Route::put('employeeu/{id}','App\Http\Controllers\EmployeeController@updateEmployee');
Route::patch('employee/{id}','App\Http\Controllers\EmployeeController@update');

Route::post('employee','App\Http\Controllers\EmployeeController@addPersonaEmpleado');

//Usuario
/***
Route::post('user','App\Http\Controllers\UserController@store');
Route::get('user','App\Http\Controllers\UserController@all');
Route::post('loginx','App\Http\Controllers\UserController@login');
Route::post('lxgin','App\Http\Controllers\UserController@login');
 *
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'App\Http\Controllers\UserController@login');

    Route::post('signup', 'App\Http\Controllers\UserController@signUp');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'App\Http\Controllers\UserController@logout');
        Route::get('user', 'App\Http\Controllers\UserController@all');
    });
});

Route::get('user1', 'App\Http\Controllers\UserController@all');
