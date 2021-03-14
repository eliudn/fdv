<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected  $fillable =
        [
            'id',
            'name',
            'city_id',
            'barrio',
            'address',
            'coordinador'
        ];


}
