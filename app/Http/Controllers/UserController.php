<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request){
        $input = $request->all();
        $input['password'] =Hash::make($request->password);

        User::create($input);
        return response()->json([
            'res'=> true,
            'message' => 'Ususario creado corretamente'
        ],200);


    }

    public  function  all(){
        $user = User::all();
        return response($user,200);
    }

    public function login(Request $request){
        $user = User::whereEmail($request->email)->fist();
        if(!is_null($user) && Hash::check($request->password, $user->password)){
            return response()->json([
                'res'=>true,
                'message'=>'Bienvenido al sistema'
            ],200);
        }
        else{
            return response()->json([
                'res'=>false,
                'message'=>'Cuenta o password incorrecto'
            ],200);
        }
    }
}
