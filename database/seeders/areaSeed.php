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
                'name'=>'contable1',
                'sede_id'=>'1',
            ]
        );
        Area::create(
            [
                'name'=>'recpcion3',
                'sede_id'=>'3',
            ]
        );
        Area::create(
            [
                'name'=>'jogistic2',
                'sede_id'=>'2',
            ]
        );
        Area::create(
            [
                'name'=>'contable2',
                'sede_id'=>'2',
            ]
        );
        Area::create(
            [
                'name'=>'producion1',
                'sede_id'=>'1',
            ]
        );
    }
}
