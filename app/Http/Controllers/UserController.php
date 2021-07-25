<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{

    public function signUp(Request $request){

        $input = $request->all();
        $input['password'] =Hash::make($request->password);

        $user = User::create($input);

        ResponseController::set_messages('Usuario creado');
        ResponseController::set_data(['user_id'=>$user->id]);
        return ResponseController::response('OK');

    }

    public  function  all(){

        $user = User::all();

        ResponseController::set_data(['users'=>$user]);
        return ResponseController::response('OK');

    }

    public function get($id){
        $validator = Validator::make(['id_user'=>$id],[
            'id_user'=>'required|integer|min:1',
        ]);
        if($validator->fails()){
            ResponseController::set_errors(true);
            ResponseController::set_messages($validator->errors()->toArray());
            return ResponseController::response('BAD REQUEST');
        }

        $user = User::find($id);

        ResponseController::set_data(['User'=>$user]);
        return ResponseController::response('CREATED');

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
        ResponseController::set_messages('Logueado');
        ResponseController::set_data([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
        return ResponseController::response('OK');

    }


    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        ResponseController::set_messages('Successfully logged out');
        return ResponseController::response('OK');

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
