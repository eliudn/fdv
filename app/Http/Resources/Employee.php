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
        return [
            'id'=>$this->id,
            'date_entry'=>$this->date_entry,
            'salary'=>$this->salary,
            'position'=>$this->position->name,
            'area'=>$this->area->name,
            'user'=>$this->user->email,
            'name1'=>$this->person->name1,
            'name2'=>$this->person->name2,
            'last_name1'=>$this->person->last_name1,
            'last_name2'=>$this->person->last_name2,
            'document_type'=>$this->person->document_type->name,
            'document_number'=>$this->person->id_number,
            'date_issue'=>$this->person->date_issue,
            'place_issue'=>$this->person->place_issue,
            'blood_type'=>$this->person->blood_type,
            'marital_status'=>$this->person->marital_status,
            'city'=>$this->person->city->name,
            'state'=>$this->state,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
