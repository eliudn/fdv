<?php

namespace App\Http\Controllers;

use App\Models\GeneralData;
use Illuminate\Http\Request;

class GeneralDataController extends Controller
{

    public function bloodType(){

        $data = GeneralData::bloodType();

        ResponseController::set_data(['BloodType'=>$data]);
        return ResponseController::response('OK');
    }

    public function maritalStatus(){

        $data = GeneralData::maritalStatus();

        ResponseController::set_data(['MaritalStatus'=>$data]);
        return ResponseController::response('OK');
    }
}
