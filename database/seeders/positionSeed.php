<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\position;
class positionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        position::create(['name'=>'Contador' ] );
        position::create(['name'=>'Seguridad' ] );
        position::create(['name'=>'ing Sitemas' ] );
        position::create(['name'=>'tesorero/a' ] );
        position::create(['name'=>'digitador' ] );
        position::create(['name'=>'coodinador de are' ] );
        position::create(['name'=>'gerente sede' ] );
        position::create(['name'=>'gerente general' ] );

    }
}
