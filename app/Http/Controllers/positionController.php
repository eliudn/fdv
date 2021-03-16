<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\position;

class positionController extends Controller
{
    public function getPosition(){
        return response()->json(position::all(),200);
    }
}
