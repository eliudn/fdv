<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentType extends Model
{
    public  $table = 'document_types';
    protected $fillable = [
        'id','name','detail'
    ];
    public $timestamps = false;
    //public $incrementing = false;
}
