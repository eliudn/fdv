<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\city;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;


class Employee extends Model
{
    use SoftDeletes;
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

    public function scopeStateTrue($query) {

        return $query->where('state',true)->first();
    }

    public function person(){
        return $this->belongsTo('App\Models\person');
    }

    public function position(){
        return $this->belongsTo( 'App\Models\position');
    }
    public  function  area(){
        return $this->belongsTo('App\Models\Area');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }



}
