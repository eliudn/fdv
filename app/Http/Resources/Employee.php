<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Employee extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $sede =$this->area;
        $sede = $sede->sede;
        $p =$this->person;
        $bloodType = $p->bloodType;

        $maritalStatus = $p->maritalStatus;
        return [
            'person'=>[
                'id'=>$this->person->id,
                'name1'=>$this->person->name1,
                'name2'=>$this->person->name2,
                'last_name1'=>$this->person->last_name1,
                'last_name2'=>$this->person->last_name2,
                'document_type'=>$this->person->document_type->name,
                'document_number'=>$this->person->id_number,
                'date_issue'=>$this->person->date_issue,
                'place_issue'=>$this->person->place_issue,
                'blood_type'=>$bloodType->name,
                'marital_status'=>$maritalStatus->name,
                'city'=>$this->person->city->name
            ],
            'employee'=>[
                'id'=>$this->id,
                'date_entry'=>$this->date_entry,
                'salary'=>$this->salary,
                'position'=>$this->position->name,
                'sede'=>$sede->name,
                'area'=>$this->area->name,
                'user'=>$this->user->email,

                'state'=>$this->state,
                'created_at'=>$this->created_at,
                'updated_at'=>$this->updated_at,
            ],

        ];
    }
}
