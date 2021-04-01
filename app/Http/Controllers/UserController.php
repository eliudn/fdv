<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signUp(Request $request){
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

    public function loginprueba(Request $request){
        $user = User::whereEmail($request->email)->first();
        if(!is_null($user) && Hash::check($request->password, $user->password)){

            $user1 = $request->user();
            $tokenResult = $user1->createToken('Personal Access Token');

            $token = $tokenResult->token;

            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
            ]);
        }
        else{
            return response()->json([
                'res'=>false,
                'message'=>'Cuenta o password incorrecto'
            ],200);
        }
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

}
