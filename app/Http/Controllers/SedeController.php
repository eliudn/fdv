<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sede;
use App\Models\Area;

class SedeController extends Controller
{
    public function getSede()
    {
        return response()->json(Sede::all(),200);
    }
    public function getSedeId($id){
        $sede = Sede::find($id);
        if (is_null($sede)){
            return response()->json(['Message'=>'not found'],404);
        }
        $sede->areas;
        return response()->json($sede,200);
    }

    public function addSede(Request $request){
        $sede = Sede::create($request->all());
        return response($sede,200);
    }

    public function updateSede(Request $request,$id){
        $sede = Sede::find($id);
        if(is_null($sede))
        {
            return response()->json(['Message'=>'not found'],404);
        }
        $sede->update($request->all());
        return  response($sede,200);
    }

    public function getArea()
    {
        return response()->json(Area::all(),200);
    }

    public function getAreaId($id){
        $area =Area::find($id);
        if (is_null($area)){
            return response()->json(['Message'=>'not found'],404);
        }

        return response()->json($area::find($id),200);
    }

    public function addArea(Request $request){
        $area =Area::create($request->all());
        return response($area,200);
    }

    public function updateArea(Request $request,$id){
        $area =Area::find($id);
        if(is_null($area))
        {
            return response()->json(['Message'=>'not found'],404);
        }
        $area->update($request->all());
        return  response($area,200);
    }

}
