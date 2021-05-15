<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sede;
use App\Models\Area;

class SedeController extends Controller
{

    public function __construct(){
        $this->middleware('auth:api');
    }

    public function getSede(Request $request)
    {
        if($request->user()->can('all_sede')){
            return response()->json(Sede::all(),200);
        }
    }


    public function getSedeId(Request $request, $id){
        if($request->user()->can('get_sede')) {
            $sede = Sede::find($id);
            if (is_null($sede)) {
                return response()->json(['Message' => 'not found'], 404);
            }

            return response()->json($sede->areas, 200);
        }
    }


    public function addSede(Request $request){

        if($request->user()->can('add_sede')) {

            $sede = Sede::create($request->all());

            return response($sede,200);
        }

    }

    public function updateSede(Request $request,$id){
        if($request->user()->can('update_sede')){
            $sede = Sede::find($id);
            if(is_null($sede))
            {
                return response()->json(['Message'=>'not found'],404);
            }
            $sede->update($request->all());
            return  response($sede,200);
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
        if($request->user()->can('all_areas')) {
            return response()->json(Area::all(), 200);
        }
    }



    public function getAreaId(Request $request,$id){
        if($request->user()->can('get_area')) {
            $area = Area::find($id);
            if (is_null($area)) {
                return response()->json(['Message' => 'not found'], 404);
            }

            return response()->json($area::find($id), 200);
        }
    }

    public function addArea(Request $request){

        if($request->user()->can('add_area')) {
            $area = Area::create($request->all());
            return response($area, 200);
        }
    }

    public function updateArea(Request $request,$id)
    {
        if ($request->user()->can('Update_area')) {
            $area = Area::find($id);
            if (is_null($area)) {
                return response()->json(['Message' => 'not found'], 404);
            }
            $area->update($request->all());
            return response($area, 200);
        }
    }

    //Falta Delete Araea
}
