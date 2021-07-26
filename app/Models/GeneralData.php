<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralData extends Model
{
    use HasFactory;

    protected $table = 'general_data';

    public function scopeBloodType($query){
        return $query->where('table_iden', 'blood_type')->get();
    }

    public function scopeMaritalStatus($query){
        return $query->where('table_iden', 'marital_status')->get();
    }


}
