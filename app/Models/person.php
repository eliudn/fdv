<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class person extends Model
{
    protected $table = 'persons';
    protected  $fillable =
        [
            'id',
            'name1',
            'name2',
            'last_name1',
            'last_name2',
            'id_number',
            'document_type_id',
            'date_issue',
            'place_issue',
            'blood_type',
            'marital_status',
            'city_id',
            'user_id'

        ];

    public function employee()
    {
        return $this->hasOne('App\Models\Employee');
    }

    public function document_type(){

        return $this->belongsTo('App\Models\documentType');
    }

    public function city(){
        return $this->belongsTo('App\Models\city');
    }
}
