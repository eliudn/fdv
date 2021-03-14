<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\documentType;
class documentTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        documentType::create([
            'name'=>'CC',
            'detail'=>'Cedula de ciudadania'
        ]);
        documentType::create([
            'name'=>'RC',
            'detail'=>'Registro Civil'
        ]);
        documentType::create([
            'name'=>'CE',
            'detail'=>'Cedula de estranjeria'
        ]);
        documentType::create([
            'name'=>'PA',
            'detail'=>'Pasaporte'
        ]);
        documentType::create([
                'name'=>'NIT',
                'detail'=>'Numero de identidad tributaria'
            ]
        );
    }
}
