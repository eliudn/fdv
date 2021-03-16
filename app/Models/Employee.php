<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\city;


class Employee extends Model
{
    protected  $fillable =
        [
            'id',
            'person_id',
            'area_id',
            'date_entry',
            'retirement_date',
            'salary',
            'position_id',
            'user_id',

        ];
    public function person(){

        return $this->belongsTo('App\Models\person');
    }


}
