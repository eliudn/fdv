<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\person;

class PersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getPerson(Request $request){

        if($request->user()->can('all_persona')){

            return response()->json(person::select(
                'persons.id','name1','name2','last_name1','last_name2',
                'document_types.name','id_number','date_issue',
                'cy.name as place_issue','blood_type','marital_status',
                'cy2.name as city', 'use.email as user'

            )->where('persons.state','<>', false)
                ->join('document_types','document_type_id', '=','document_types.id' )
                ->join('cities as cy', 'place_issue', 'cy.id')
                ->join('cities as cy2','city_id','cy2.id')
                ->join('users as use','user_id', 'use.id' )->get(),200);

        }
     }

     public function getPersonId($id,Request $request){

         if($request->user()->can('get_persona')){

             $person = person::find($id);
             if (is_null($person)){
                 return response()->json(['Message'=>'not found'],404);
             }
             return response()->json($person::select(
                 'persons.id','name1','name2','last_name1','last_name2',
                 'document_types.name','id_number','date_issue',
                 'cy.name as place_issue','blood_type','marital_status',
                 'cy2.name as city', 'use.email as user'

             )->where('persons.state','<>', false)
                 ->join('document_types','document_type_id', '=','document_types.id' )
                 ->join('cities as cy', 'place_issue', 'cy.id')
                 ->join('cities as cy2','city_id','cy2.id')
                 ->join('users as use','user_id', 'use.id' )->get(),200);

         }
     }


     public function  addPerson(Request $request){

         if($request->user()->can('add_persona')){

             $person = person::create($request->all());
             return response($person,200);
         }
    }

     public function updatePerson(Request $request, $id){

         if($request->user()->can('update_persona')){
             $person = person::find($id);
             if(is_null($person))
             {
                 return response()->json(['Message'=>'not found'],404);
             }
             $person->update($request->all());
             return  response($person,200);
         }


     }
}
