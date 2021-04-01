<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;
class areaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create(
            [
                'name'=>'Contabilidad',
                'sede_id'=>'1',
            ]
        );
        Area::create(
            [
                'name'=>'Operativo',
                'sede_id'=>'3',
            ]
        );
        Area::create(
            [
                'name'=>'Manofactura',
                'sede_id'=>'2',
            ]
        );
        Area::create(
            [
                'name'=>'Administrativo',
                'sede_id'=>'2',
            ]
        );
        Area::create(
            [
                'name'=>'Operativo',
                'sede_id'=>'1',
            ]
        );
    }
}
