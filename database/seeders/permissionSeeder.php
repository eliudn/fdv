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

        //Usuario
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
        // persona
        $seed[]=[
            'name'=>'crear persona',
            'slug'=>'add_persona',
        ];
        $seed[]=[
        'name'=>'actualizar persona',
        'slug'=>'update_persona',
         ];
        $seed[]=[
        'name'=>'eliminar persona',
        'slug'=>'delete_persona',
         ];
        $seed[]=[
        'name'=>'consulta persona',
        'slug'=>'all_persona',
        ];
        $seed[]=[
            'name'=>'consulta persona id',
            'slug'=>'get_persona',
        ];
        // empleado
        $seed[]=[
            'name'=>'crear empleado',
            'slug'=>'add_empleado',
        ];
        $seed[]=[
            'name'=>'actualizar empleado',
            'slug'=>'update_empleado',
        ];
        $seed[]=[
            'name'=>'eliminar empleado',
            'slug'=>'delete_empleado',
        ];
        $seed[]=[
            'name'=>'eliminar empleado',
            'slug'=>'delete_empleado',
        ];
        $seed[]=[
            'name'=>'consulta empleado',
            'slug'=>'all_empleado',
        ];
        $seed[]=[
            'name'=>'consulta empleado id',
            'slug'=>'get_empleado',
        ];
        // sede
        $seed[]=[
            'name'=>'crear sede',
            'slug'=>'add_sede',
        ];
        $seed[]=[
            'name'=>'actualizar sede',
            'slug'=>'update_sede',
        ];
        $seed[]=[
            'name'=>'eliminar sede',
            'slug'=>'delete_sede',
        ];
        $seed[]=[
            'name'=>'consutar sedes',
            'slug'=>'all_sede',
        ];
        // Position
        $seed[]=[
            'name'=>'crear Cargo',
            'slug'=>'add_cargo',
        ];
        $seed[]=[
            'name'=>'actualizar cargo',
            'slug'=>'update_cargo',
        ];
        $seed[]=[
            'name'=>'eliminar cargo',
            'slug'=>'delete_cargo',
        ];
        $seed[]=[
            'name'=>'consulta cargo',
            'slug'=>'all_cargo',
        ];
        //
        DB::table('permissions')->insert($seed);

    }
}
