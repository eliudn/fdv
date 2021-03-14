<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departament;
use App\Models\city;
use App\Models\documentType;

class LocationController extends Controller
{
    public function getDepartaments(){

        return response()->json(departament::all(),200);
    }

    public function getDepartamentId($id){
        $departament = departament::find($id);
        if (is_null($departament)){
            return response()->json(['Message'=>'not found'],404);
        }
        return response()->json($departament::find($id),200);
    }
    public function getCities($id){

        $city = city::find($id);
        if (is_null($city)){
            return response()->json(['Message'=>'not found'],404);
        }
        return response()->json($city::find($id),200);
    }
    public function getDocumentType(){
        return response()->json(documentType::all(),200);
    }


}
