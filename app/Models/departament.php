<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departament extends Model
{
    protected $fillable = [
        'id','name','detail'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function cities(){
        return $this->hasMany('App\Models\city');
    }
}
