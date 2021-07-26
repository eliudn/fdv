<?php

namespace App\Http\Controllers;


use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\position;
use Illuminate\Support\Facades\Validator;

class positionController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth:api');
    }

    public function get_all(Request $request){
        if($request->user()->can('all_cargo')){

            ResponseController::set_data(['cargosTrabajador'=>position::all()]);
            return ResponseController::response('OK');
        }else{
            ResponseController::set_errors(true);
            ResponseController::set_messages("USUARIO SIN PERMISO");
            return ResponseController::response('BAD REQUEST');
        }

    }

    public function store(Request $request)
    {
        if($request->user()->can('add_cargo')){

            if(!$position = position::create([
                'name'=>$request->name,
                'detail'=>$request->detail,
            ])){
                ResponseController::set_errors(true);
                ResponseController::set_messages("Error creando el usuario");
                return ResponseController::response('BAD REQUEST');
            }
            ResponseController::set_messages("Cargo creado");
            ResponseController::set_data(['cargo_id' => $position->id]);
            return ResponseController::response('CREATED');
        }else{
            ResponseController::set_errors(true);
            ResponseController::set_messages("USUARIO SIN PERMISO");
            return ResponseController::response('BAD REQUEST');
        }
    }


    public function get(Request $request, $id)
    {
        if($request->user()->can('get_cargo')){

            $validator = Validator::make(
                ['position_id'=>$id],
                ['position_id'=>'required|integer|min:1|exists:position,id']
            );
            if($validator->fails()){
                ResponseController::set_errors(true);
                ResponseController::set_messages($validator->errors()->toArray());
                return ResponseController::response('BAD REQUEST');
            }

            ResponseController::set_data(['cargo trabajador' => position::find($id)]);
            return ResponseController::response('OK');
        }else{
            ResponseController::set_errors(true);
            ResponseController::set_messages("USUARIO SIN PERMISO");
            return ResponseController::response('BAD REQUEST');
        }

    }

    public function update(Request $request, $id){

        if($request->user()->can('update_cargo')){

            $position = position::find($id);

            if(isset($request->name)){
                $position->name =  $request->name;
            }

            if (isset($request->detail)){
                $position->detail =$request->detail;
            }

            try {
                $position->save();
            }catch (\Exception $e){
                ResponseController::set_errors(true);
                ResponseController::set_messages("error actualizando cargo");
                ResponseController::set_messages($e->getMessage());
                return ResponseController::response('BAD REQUEST');
            }

            ResponseController::set_messages("Cargo actualizado");
            return ResponseController::response('OK');
        }else{
            ResponseController::set_errors(true);
            ResponseController::set_messages("USUARIO SIN PERMISO");
            return ResponseController::response('BAD REQUEST');
        }

    }

    public function destroy(Request $request, $id){

        if($request->user()->can('delete_cargo')) {

            try {
                position::destroy($id);
            }catch (\Exception $e){
                ResponseController::set_errors(true);
                ResponseController::set_messages("error eliminado el cargo");
                ResponseController::set_messages($e->getMessage());
                return ResponseController::response('BAD REQUEST');
            }
            ResponseController::set_messages("usuario eliminado");
            return ResponseController::response('OK');

        }else{
            ResponseController::set_errors(true);
            ResponseController::set_messages("USUARIO SIN PERMISO");
            return ResponseController::response('BAD REQUEST');
        }
    }
}
