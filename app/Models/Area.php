<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area';
    protected  $fillable =
        [
            'id',
            'name',
            'detail',
            'sede_id',

        ];
    public $timestamps = false;
}
