<?php

namespace App\Http\Controllers;

use App\Models\position;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Resources\Employee as EmployeeResource;
use App\Models\person;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }

    public function get_all(Request $request)
    {
        if($request->user()->can('all_empleado')){
            $employee = Employee::all();


            ResponseController::set_data(['Empleados'=> EmployeeResource::collection($employee)]);
            return ResponseController::response('OK');
            //return response()->json($employee,200);
        }else{
            ResponseController::set_errors(true);
            ResponseController::set_messages("USUARIO SIN PERMISO");
            return ResponseController::response('BAD REQUEST');
        }

    }


    public function get(Request $request, $id)
    {
        if($request->user()->can('get_empleado')) {
            $employee =Employee::where('state','true')->find($id);

            if(is_null($employee))
            {
                return response()->json(['Message'=>'not found'],404);
            }


            ResponseController::set_data(['Empleado'=> new EmployeeResource($employee) ]);
            return ResponseController::response('OK');
            //return response()->json($employee,200);
        }else{
            ResponseController::set_errors(true);
            ResponseController::set_messages("USUARIO SIN PERMISO");
            return ResponseController::response('BAD REQUEST');
        }

    }

    public function store(Request $request){
        if($request->user()->can('add_empleado')){
           if(!$employee = Employee::create($request->all())){
               ResponseController::set_errors(true);
               ResponseController::set_messages("Error creando el usuario");
               return ResponseController::response('BAD REQUEST');
           }
            ResponseController::set_messages("Cargo creado");
            ResponseController::set_data(['Empleado_id' => $employee->id]);
            return ResponseController::response('CREATED');
            //return response($Employee,200);
        }else{
            ResponseController::set_errors(true);
            ResponseController::set_messages("USUARIO SIN PERMISO");
            return ResponseController::response('BAD REQUEST');
        }
    }

    public function store_all(Request $request)
    {
        if($request->user()->can('add_personaEmpleado'))
        {
            $rules=array(
                "name1"=>"required|string",
                //"name2"=>"string",
                "last_name1"=>"required|string",
                "last_name2"=>"string",
                "id_number"=>"required|numeric",
                "document_type_id"=>"required|numeric",
                "blood_type"=> "required|string",
                "city_id"=>"required|numeric",

                "area_id"=>"required|numeric",
                "date_entry"=>"required|string",
                "salary" =>"required|numeric",
                "position_id" =>"required|numeric",
            );
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){

                ResponseController::set_errors(true);
                ResponseController::set_messages($validator->errors());
                return ResponseController::response('BAD REQUEST');

            }else{
                try {

                    DB::transaction( function () use($request){
                        $person = person::create(
                            [
                                'name1' => $request->name1,
                                'name2' => $request->name2,
                                'last_name1' => $request->last_name1,
                                'last_name2' => $request->last_name2,
                                'id_number' => $request->id_number,
                                'document_type_id' => $request->document_type_id,
                                'date_issue' => $request->date_issue,
                                'place_issue' => $request->place_issue,
                                'blood_type' => $request->blood_type,
                                'marital_status' => $request->marital_status,
                                'city_id' => $request->city_id,
                                'user_id' => $request->user()->id,
                            ]);

                        $employee = Employee::create(
                            [
                                'person_id'=>$person->id,
                                'area_id'=>$request->area_id,
                                'date_entry'=>$request->date_entry,
                                'retirement_date'=>$request->retirement_date,
                                'salary'=>$request->salary,
                                'position_id'=>$request->position_id,
                                'user_id'=>$request->user()->id,
                            ]);

                    });
                    ResponseController::set_messages("Empleado  creado");

                    return ResponseController::response('CREATED');
                }catch (\Exception $e){
                    ResponseController::set_errors(true);
                    ResponseController::set_messages($e);
                    return ResponseController::response('BAD REQUEST');
                }


            }

        }else{
            ResponseController::set_errors(true);
            ResponseController::set_messages("USUARIO SIN PERMISO");
            return ResponseController::response('BAD REQUEST');
        }


    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update__all($id,Request $request){

        if($request->user()->can('update_empleado')){
            $Employee = Employee::find($id);
            $rules=array(
               'name1'=>'required|string',
                'name2'=>'string',
                'last_name1'=>'required|string',
                'last_name2'=>'string',
                // 'id_number'=>'required|numeric',
                'document_type_id'=>'required|numeric',
                'blood_type'=> 'required|string',
                'city_id'=>'required|numeric',
                //'user_id'=>'required|string',
                'area_id'=>'required|numeric',
                'date_entry'=>'required|string',
                'salary' =>'required|numeric',
                'position_id' =>'required|numeric',
            );
            if(is_null($Employee))
            {
                ResponseController::set_errors(true);
                ResponseController::set_messages("No encontrado");
                return ResponseController::response('BAD REQUEST');
            }
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){

                ResponseController::set_errors(true);
                ResponseController::set_messages($validator->errors());
                return ResponseController::response('BAD REQUEST');

            }else{

                $person = person::find($Employee->person_id);
                $Employee->update(
                    [
                        'area_id'=>$request->area_id,
                        'date_entry'=>$request->date_entry,
                        'retirement_date'=>$request->retirement_date,
                        'salary'=>$request->salary,
                        'position_id'=>$request->position_id

                    ]
                );
                if($person){
                    $person->update([
                        'name1' => $request->name1,
                        'name2' => $request->name2,
                        'last_name1' => $request->last_name1,
                        'last_name2' => $request->last_name2,
                        'id_number' => $request->id_number,
                        'document_type_id' => $request->document_type_id,
                        'date_issue' => $request->date_issue,
                        'place_issue' => $request->place_issue,
                        'blood_type' => $request->blood_type,
                        'marital_status' => $request->marital_status,
                        'city_id' => $request->city_id
                    ]);
                }

            }
            $Employee->person;

            ResponseController::set_data(['Empleado'=>$Employee]);
            ResponseController::set_messages('Empleado actulizado');
            return ResponseController::response('OK');
        }
        else{
            ResponseController::set_errors(true);
            ResponseController::set_messages("USUARIO SIN PERMISO");
            return ResponseController::response('BAD REQUEST');
        }
    }



    public function update($id,Request $request){
        if($request->user()->can('update_personaEmpleado')){
            $employee = Employee::find($id);
            if(!$employee)
            {
                ResponseController::set_errors(true);
                ResponseController::set_messages("Empleado no existe");
                return ResponseController::response('BAD REQUEST');
            }
            //persons
            $name1 = $request->name1;
            $name2 = $request->name2;
            $last_name1 = $request->last_name1;
            $last_name2 = $request->last_name2;
            $id_number = $request->id_number;
            $document_type_id = $request->document_type_id;
            $date_issue = $request->date_issue;
            $place_issue = $request->place_issue;
            $blood_type = $request->blood_type;
            $marital_status = $request->marital_status;
            $city_id = $request->city_id;

            //Empleado
            $area_id=$request->area_id;
            $date_entry=$request->date_entry;
            $retirement_date=$request->retirement_date;
            $salary=$request->salary;
            $position_id=$request->position_id;

            if($request->method()=='PATCH'){
                $person = person::find($employee->person_id);
                $bandera=False;
                if($name1){
                    $person->name1=$name1;
                    $bandera=true;
                }
                if($name2){
                    $person->name2=$name2;
                    $bandera=true;
                }
                if($last_name1!=null || $last_name1!=''){
                    $person->last_name1=$last_name1;
                    $bandera=true;
                }
                if($last_name2!=null || $last_name2!=''){
                    $person->last_name2=$last_name2;
                    $bandera=true;
                }
                if($id_number!=null || $id_number!=''){
                    $person->id_number=$id_number;
                    $bandera=true;
                }
                if($document_type_id!=null || $document_type_id!=''){
                    $person->document_type_id=$document_type_id;
                    $bandera=true;
                }
                if($date_issue!=null || $date_issue!=''){
                    $person->date_issue=$date_issue;
                    $bandera=true;
                }
                if($place_issue!=null || $place_issue){
                    $person->place_issue=$place_issue;
                    $bandera=true;
                }
                if($blood_type!=null || $blood_type!=''){
                    $person->blood_type=$place_issue;
                    $bandera=true;
                }
                if($marital_status!= null || $marital_status!=''){
                    $person->marital_status=$marital_status;
                    $bandera=true;
                }
                if($city_id!=null || $city_id!=''){
                    $person->city_id=$city_id;
                    $bandera=true;
                }

                if($area_id!=null || $area_id!=''){
                    $employee->area_id=$area_id;
                    $bandera=true;
                }
                if($date_entry!=null || $date_entry!= ''){
                    $employee->date_entry=$date_entry;
                    $bandera=true;
                }
                if($retirement_date!=null || $retirement_date!=''){
                    $employee->retirement_date=$retirement_date;
                    $bandera=true;
                }
                if($salary!=null || $salary!=''){
                    $employee->salary=$salary;
                    $bandera=true;
                }

                if($position_id!=null || $position_id!=''){
                    $employee->position_id=$position_id;
                    $bandera=true;
                }
                if($bandera){
                    $person->save();
                    $employee->save();

                    ResponseController::set_messages("Empleado actualizado");
                    ResponseController::set_data(['Empleado'=> new EmployeeResource($employee) ]);
                    return ResponseController::response('OK');



                }else
                {
                    ResponseController::set_errors(true);
                    ResponseController::set_messages('No se ha modificado ningún dato de empleado.');

                    return ResponseController::response('NOT MODIFIED');

                }
            }
        }else{
            ResponseController::set_errors(true);
            ResponseController::set_messages("USUARIO SIN PERMISO");
            return ResponseController::response('BAD REQUEST');
        }
    }
}
