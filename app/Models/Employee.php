<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
