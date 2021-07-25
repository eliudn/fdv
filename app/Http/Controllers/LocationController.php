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

        $departament = departament::all();
        ResponseController::set_data(['Departamentos' => $departament]);
        return ResponseController::response('OK');

    }

    public function getDepartamentId($id, Request $request){

            $departament = departament::find($id);
            if (is_null($departament)){
                ResponseController::set_errors(true);
                ResponseController::set_messages("Sin dato");
                return ResponseController::response('BAD REQUEST');
            }
        $departament->cities;
        ResponseController::set_data(['Departamento' => $departament]);
        //ResponseController::set_data(['Municipios' => $departament->cities]);
        return ResponseController::response('OK');

    }


    public function getCities($id, Request $request){


            $city = city::find($id);
            if (is_null($city)){
                ResponseController::set_errors(true);
                ResponseController::set_messages("Sin dato");
                return ResponseController::response('BAD REQUEST');
            }
        ResponseController::set_data(['Departamento' => $city::find($id)]);
        //ResponseController::set_data(['Municipios' => $departament->cities]);
        return ResponseController::response('OK');



    }

    // Tipo de documentos
    public function getDocumentType(){

        ResponseController::set_data(['documentType'=> documentType::all()]);
        return ResponseController::response('OK');

    }


}
