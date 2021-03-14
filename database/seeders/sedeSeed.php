<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sede;
class sedeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sede::create(
            [
                'name'=>'Principal',
                'city_id'=>'8001',
                'barrio'=>'barrio1',
                'address'=>'cll233445',
            ]
        );
        Sede::create(
            [
                'name'=>'sede1',
                'city_id'=>'11001',
                'barrio'=>'barrio33',
                'address'=>'crr3213',
            ]
        );
        Sede::create(
            [
                'name'=>'sede2',
                'city_id'=>'8296',
                'barrio'=>'barrio102',
                'address'=>'cd33344',
            ]
        );
    }
}
