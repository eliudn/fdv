<?php

namespace App\Http\Controllers;

use App\Models\position;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\person;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }

    public function getEmployee(Request $request)
    {
        if($request->user()->can('all_empleado')){
            $employee = Employee::all()->where('state',true);
            /*$employee =Employee::select('employees.id','pe.name1','pe.name2',
                'pe.last_name1','pe.last_name2','doty.detail as document_type','pe.id_number',
                'cy.name as place_issue','pe.date_issue','a.name as area','p.name as position',
                'blood_type','marital_status', 'date_entry','retirement_date','salary','cy2.name as city','employees.state')
                ->join('persons as pe','person_id','pe.id')
                ->join('document_types as doty','pe.document_type_id','doty.id' )
                ->join('area as a', 'area_id','a.id')
                ->join('position as p', 'position_id','p.id')
                ->join('cities as cy', 'pe.place_issue', 'cy.id')
                ->join('cities as cy2','pe.city_id','cy2.id')
                ->where('employees.state',true)
                ->get();*/

            foreach ($employee as $e){
                $e->position;
                $e->area;
                $e->person;
                $e->user;
            }

            return response()->json($employee,200);
        }

    }


    public function getEmployeeId(Request $request, $id)
    {
        if($request->user()->can('get_empleado')) {
            $employee =Employee::where('state','true')->find($id);

            if(is_null($employee))
            {
                return response()->json(['Message'=>'not found'],404);
            }

            $employee->position;
            $employee->area;
            $employee->person;
            $employee->user;

            return response()->json($employee,200);
        }

    }

    public function  addEmployee(Request $request){
        if($request->user()->can('add_empleado')){
            $Employee = Employee::create($request->all());

            return response($Employee,200);
        }
    }

    public function addPersonaEmpleado(Request $request)
    {
        if($request->user()->can('add_personaEmpleado')){
            $rules=array(
                "name1"=>"required|string",
                //"name2"=>"string",
                "last_name1"=>"required|string",
                "last_name2"=>"string",
                "id_number"=>"required|numeric",
                "document_type_id"=>"required|numeric",
                "blood_type"=> "required|string",
                "city_id"=>"required|numeric",
                "user_id"=>"required|numeric",
                "area_id"=>"required|numeric",
                "date_entry"=>"required|string",
                "salary" =>"required|numeric",
                "position_id" =>"required|numeric",
            );
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return $validator->errors();
            }else{
                $id_number =Person::where('id_number',$request->id_number)->get();
                if(count($id_number)==0){
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
                            'user_id' => $request->user_id
                        ]
                    );
                    if(!is_null($person)){
                        $Employee = Employee::create(
                            [
                                'person_id'=>$person->id,
                                'area_id'=>$request->area_id,
                                'date_entry'=>$request->date_entry,
                                'retirement_date'=>$request->retirement_date,
                                'salary'=>$request->salary,
                                'position_id'=>$request->position_id,
                                'user_id'=>$request->user_id,
                            ]
                        );
                    }
                }else{
                    return response()->json(['Message'=>'La cedula se encuentra registrada',],401);
                }
            }

            $Employe = Employee::find($Employee->id);
            $Employe->person;
            return response($Employe,200);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function updateEmployee($id,Request $request){

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
                return response()->json(['Message'=>'not found'],401);
            }
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return $validator->errors();
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
            return response($Employee,200);
        }
    }



    public function update($id,Request $request){
        if($request->user()->can('update_empleadoPersona')){
            $employee = Employee::find($id);
            if(!$employee)
            {
                return response()->json(['Message'=>'not found'],401);
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

                    $employee->person;

                    return response($employee,200);

                }else
                {

                    return response()->json(['errors'=>array([
                        'code'=>304,'message'=>'No se ha modificado ningún dato de empleado.'
                        ,'data'=>$request->name1])],305);
                }
            }
        }
    }
}
