<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $fillable = [
        'id','name','detail','departamet_id'
    ];
    public $timestamps = false;
    public $incrementing = false;
}
