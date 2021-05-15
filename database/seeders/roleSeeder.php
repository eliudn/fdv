<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed[]=[
            'name'=>'Desarrollador backend',
            'slug'=>'developer',
        ];
        $seed[]=[
            'name'=>'Administrador de sistemas',
            'slug'=>'admin',
        ];
        $seed[]=[
            'name'=>'general',
            'slug'=>'user',
        ];


        DB::table('roles')->insert($seed);
    }
}
