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
//Routes

Route::group(['middleware'=>'auth:api'],
    function (){

    /// version1
    Route::group(['prefix'=>'v1'], function(){


        Route::group(['middleware'=>'role:developer'],
            function (){

                //USUARIUO
                Route::group(['prefix'=>'users'],function(){
                    Route::get('','App\Http\Controllers\UserController@all');

                    Route::get('id/{id_user}/roles','App\Http\Controllers\UsersController@roles');
                    Route::post('roles','App\Http\Controllers\UsersController@add_rol');
                    Route::delete('roles', 'App\Http\Controllers\UsersController@remove_rol');

                    Route::get('id/{id_user}/permissions','App\Http\Controllers\UsersController@permissions');
                    Route::post('permission','App\Http\Controllers\UsersController@add_permission');
                    Route::delete('permission','App\Http\Controllers\UsersController@remove_permission');
                });

                //ROLES
                Route::group(['prefix' => 'roles'],
                    function () {
                        Route::post('', 'App\Http\Controllers\UserRolesController@store');
                        Route::get('', 'App\Http\Controllers\UserRolesController@get');
                        Route::patch('', 'App\Http\Controllers\UserRolesController@update');
                        Route::delete('', 'App\Http\Controllers\UserRolesController@destroy');

                        //Premisos

                        Route::get('id/{id_rol}/permissions','App\Http\Controllers\UserRolesController@permissions');
                        Route::post('permissions','App\Http\Controllers\UserRolesController@add_permissions');
                        Route::delete('permissions','App\Http\Controllers\UserRolesController@remove_permissions');
                    });

                //PERMISOS
                Route::group(['prefix'=>'permissions']
                    ,function(){
                        Route::post('','App\Http\Controllers\UserPermissionsCotroller@store');
                        Route::get('','App\Http\Controllers\UserPermissionsCotroller@get');
                        Route::patch('','App\Http\Controllers\UserPermissionsCotroller@update');
                        Route::delete('','App\Http\Controllers\UserPermissionsCotroller@destroy');
                    });

            }

        );

    });



    }

);





