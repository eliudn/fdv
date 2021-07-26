<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sede;
use App\Models\Area;
use App\Http\Controllers\ResponseController;

class SedeController extends Controller
{

    public function __construct(){
        $this->middleware('auth:api');
    }

    public function getSede(Request $request)
    {
        if($request->user()->can('all_sede')){
            $sede =Sede::all();

            ResponseController::set_data(['Sede' =>$sede]);
            return ResponseController::response('OK');
        }
    }


    public function getSedeId(Request $request, $id){
        if($request->user()->can('all_sede')) {
            $sede = Sede::find($id);
            if (is_null($sede)) {
                ResponseController::set_messages('not fount');
                return ResponseController::response('NO CONTENT');
            }

            ResponseController::set_data(['Areas' =>$sede->areas]);
            return ResponseController::response('OK');

        }
    }


    public function addSede(Request $request){

        if($request->user()->can('add_sede')) {

            $sede = Sede::create($request->all());

            ResponseController::set_data(['Sede' =>$sede->id]);
            ResponseController::set_messages('Sede creada');
            return ResponseController::response('OK');


        }

    }

    public function updateSede(Request $request,$id){
        if($request->user()->can('update_sede')){
            $sede = Sede::find($id);
            if(is_null($sede))
            {
                ResponseController::set_messages('not fount');
                return ResponseController::response('NO CONTENT');
            }
            $sede->update($request->all());
            ResponseController::set_data(['Sede' =>$sede]);
            ResponseController::set_messages('Update sede');
            return ResponseController::response('OK');
        }

    }

    //Falta delete sede


    /// Areas
    /**
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function getArea(Request $request)
    {
        if($request->user()->can('all_sede')) {

            $area = Area::all();

            ResponseController::set_data(['Area' =>$area]);

            return ResponseController::response('OK');


        }
        ResponseController::set_errors(true);
        ResponseController::set_messages("USUARIO SIN PERMISO");
        return ResponseController::response('BAD REQUEST');
    }



    public function getAreaId(Request $request,$id){
        if($request->user()->can('get_area')) {
            $area = Area::find($id);
            if (is_null($area)) {
                ResponseController::set_messages('not fount');
                return ResponseController::response('NO CONTENT');
            }

            ResponseController::set_data(['Area' =>$area]);

            return ResponseController::response('OK');
        }
    }

    public function addArea(Request $request){

        if($request->user()->can('add_area')) {
            $area = Area::create($request->all());

            ResponseController::set_data(['Area' =>$area]);
            ResponseController::set_messages('Create area');
            return ResponseController::response('CREATED');

        }
    }

    public function updateArea(Request $request,$id)
    {
        if ($request->user()->can('Update_area')) {
            $area = Area::find($id);
            if (is_null($area)) {
                ResponseController::set_messages('not fount');
                return ResponseController::response('NO CONTENT');
            }
            $area->update($request->all());
            ResponseController::set_data(['Area' =>$area]);
            ResponseController::set_messages('Create area');
            return ResponseController::response('CREATED');
        }
    }

    //Falta Delete Araea
}
