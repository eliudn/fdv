<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        $seed[]=[
            'name'=>'crear usario',
            'slug'=>'add_user',
        ];
        $seed[]=[
            'name'=>'editar usario',
            'slug'=>'edit_user',
        ];
        $seed[]=[
            'name'=>'ver usario',
            'slug'=>'show_user',
        ];
        $seed[]=[
            'name'=>'eliminar usario',
            'slug'=>'delete_user',
        ];
        DB::table('permissions')->insert($seed);

    }
}
