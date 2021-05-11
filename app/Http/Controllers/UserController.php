<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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



    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function roles($id_user){
        $user = User::find($id_user);
        $user->roles;
        return response($user,200) ;
    }

    public function add_rol(Request $request){
        $user= User::find($request->id_user);


        $user->roles()->attach($request->id_role);

        return response($user, 200);
    }

    public function remove_rol(Request $request){
        $user = User::find($request->id_user);

        $user->roles()->detach($request->id_role);
        response('Rol Eliminado', 200);
    }

    public function permissions($id_user){
        $user = User::find($id_user);

        $permission=[];

        foreach ($user->roles as $index => $rol){
            foreach ($rol->permissions as $permission) {
                $permission[$permission->id]=$permission->name;
            }
        }

        return response($permission, 200);

    }

    public function add_permission(Request $request){

        $user = User::find($request->id_user);

        $user->permissions()->attach($request->id_permission);

        return response($user, 200);
    }

    public function  remove_permission(Request $request){
        $user = User::find($request->id_user);

        $user->permission()->detach($request->id_permission);

        return response('Permiso eliminado', 200);
    }

}
