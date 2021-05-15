<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departament;
use App\Models\city;
use App\Models\documentType;
use phpDocumentor\Reflection\Types\Resource_;

class LocationController extends Controller
{
    public function __Construct(){
        $this->middleware('auth:api');
    }

    public function getDepartaments(Request $request){
        if($request->user()->can('all_departamentos')){}
        $departament = departament::all();
        return response()->json($departament,200);
    }

    public function getDepartamentId($id, Request $request){

        if($request->user()->can('all_municipios')){

            $departament = departament::find($id);
            if (is_null($departament)){
                return response()->json(['Message'=>'not found'],404);
            }
            return response()->json($departament->cities,200);
        }
    }


    public function getCities($id, Request $request){

        if($request->user()->can('get_municipio')){
            $city = city::find($id);
            if (is_null($city)){
                return response()->json(['Message'=>'not found'],404);
            }
            return response()->json($city::find($id),200);
        }

    }

    // Tipo de documentos
    public function getDocumentType(Request $request){

        return response()->json(documentType::all(),200);
    }


}
