<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    public $table = 'position';
    protected  $fillable =
        [
            'id',
            'name',
            'detail'
        ];
    public $timestamps = false;
    public function employees(){
        return $this->hasMany('App\Models\Employee');
    }
}
