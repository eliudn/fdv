<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\person;
class EmployeeController extends Controller
{
    public function getEmployee()
    {
        return response()->json(Employee::all(),200);
    }
    public function getEmployeeId($id)
    {
        $employee =Employee::find($id);
        if(is_null($employee))
        {
            return response()->json(['Message'=>'not found'],404);
        }
        $employee->person;
        return response()->json($employee,200);
    }

    public function  addEmployee(Request $request){
        $Employee = Employee::create($request->all());

        return response($Employee,200);
    }

    public function addPersonaEmpleado(Request $request)
    {
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
        $Employe = Employee::find($Employee->id);
        $Employe->persons;
        return response($Employe,200);

    }

    public function updateEmployee(Request $reques, $id){
        $Employee = Employee::find($id);
        if(is_null($Employee))
        {
            return response()->json(['Message'=>'not found'],404);
        }
        $Employee->update($reques->all());
        return  response($Employee,200);
    }
}
