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
        return response()->json($employee::find($id),200);
    }

    public function  addEmployee(Request $request){
        $Employee = Employee::create($request->all());
        return response($Employee,200);
    }

    public function addPersonaEmpleado(Request $request)
    {
        $person = person::find();
        $person->name1 = $request->'name1';

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
