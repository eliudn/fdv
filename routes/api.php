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



Route::group(['prefix' => 'auth'], function () {

    Route::post('login', 'UserController@login');

    Route::post('signup', 'UserController@signUp');

    Route::group([
        'middleware' => 'auth:api'
        ], function() {
         Route::get('logout', 'UserController@logout');
            });
});
//Routes

Route::group(['middleware'=>'auth:api'],
    function (){

       Route::group(['middleware'=>'role:developer'],
           function (){

                //USUARIUO
                Route::group(['prefix'=>'users'],function(){
                    Route::get('','UserController@all');
                    Route::get('{$id}', 'UserController@get');

                    Route::get('id/{id_user}/roles','UsersController@roles');
                    Route::post('roles','UsersController@add_rol');
                    Route::delete('roles', 'UsersController@remove_rol');

                    Route::get('id/{id_user}/permissions','UserController@permissions');
                    Route::post('permission','UsersController@add_permission');
                    Route::delete('permission','UsersController@remove_permission');
                });

                //ROLES
                Route::group(['prefix' => 'roles'],
                    function () {
                        Route::post('', 'UserRolesController@store');
                        Route::get('', 'UserRolesController@get');
                        Route::patch('', 'UserRolesController@update');
                        Route::delete('', 'UserRolesController@destroy');

                        //Premisos

                        Route::get('id/{id_rol}/permissions','UserRolesController@permissions');
                        Route::post('permissions','UserRolesController@add_permission');
                        Route::delete('permissions','UserRolesController@remove_permission');
                    });




                //PERMISOS
                Route::group(['prefix'=>'permissions']
                    ,function(){
                        Route::post('','UserPermissionsCotroller@store');
                        Route::get('','UserPermissionsCotroller@get');
                        Route::patch('','UserPermissionsCotroller@update');
                        Route::delete('','UserPermissionsCotroller@destroy');
                    });

                // Pesona
                Route::get('person','PersonController@getPerson');
                Route::get('person/{id}','PersonController@getPersonId');
                Route::post('person','PersonController@addPerson');
                Route::put('Person','PersonController@updatePerson');

                //sede area
                Route::get('sede','SedeController@getSede');
                Route::get('sede/{id}','SedeController@getSedeId');
                Route::post('sede','SedeController@addSede');
                Route::put('sede','SedeController@updateSede');

                Route::get('area','SedeController@getArea');
                Route::get('area/{id}','SedeController@getAreaId');
                Route::post('area','SedeController@addArea');
                Route::put('area','SedeController@updateArea');

                // Localisacion
                Route::get('region','LocationController@getDepartaments');
                Route::get('region/{id}','LocationController@getDepartamentId');


                Route::get('document_type','LocationController@getDocumentType');

                // Empleado
                Route::get('employee','EmployeeController@get_all');
                Route::get('employee/{id}','EmployeeController@get');
                Route::post('Employees','EmployeeController@store');
                Route::put('employeeu/{id}','EmployeeController@update__all');
                Route::patch('employee/{id}','EmployeeController@update');
                Route::delete('employee/{id}', 'EmployeeController@delete');

                Route::post('employee','EmployeeController@store_all');
                Route::get('employee/delete','EmployeeController@showDelete');
                //Cargo
                Route::group(['prefix'=>'position'], function (){
                    Route::get('','positionController@get_all');
                    Route::get('{id}','positionController@get');
                    Route::post('', 'positionController@store');
                    Route::put('{id}','positionController@update');
                    Route::delete('{id}','positionController@destroy');

                });

                Route::get('bloodType', 'GeneralDataController@bloodType');
                Route::get('maritalStatus', 'GeneralDataController@maritalStatus');
            });
});
