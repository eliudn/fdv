<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sede;

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

    public function sede(){
        return $this->belongsTo(Sede::class);
    }
}
