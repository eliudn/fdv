<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\position;

class positionController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auht:api');
    }

    public function getPosition(Request $request){
        if($request->user()->can('all_cargos')){
            return response()->json(position::all(),200);
        }
    }
}
