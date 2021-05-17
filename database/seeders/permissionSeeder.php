<?php

namespace Database\Seeders;

use App\Models\Permission;
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
        Permission::create(
            // Usuario
            [
                'name'=>'creacion usario',
                'slug'=>'add_user',
            ],

        );

        Permission::create(
            [
                'name'=>'editar usario',
                'slug'=>'edit_user',
            ],
        );
        Permission::create(
            [
                'name'=>'ver usario',
                'slug'=>'show_user',
            ],
        );
        Permission::create(
            [
                'name'=>'eliminar usario',
                'slug'=>'delete_user',
            ],
        );
        Permission::create(
            [
                'name'=>'crear persona',
                'slug'=>'add_persona',
            ],
        );
        Permission::create(
            [
                'name'=>'actualizar persona',
                'slug'=>'update_persona',
            ],
        );
        Permission::create(

            [
                'name'=>'eliminar persona',
                'slug'=>'delete_persona',
            ],
        );
        Permission::create(
            [
                'name'=>'consulta persona',
                'slug'=>'all_persona',
            ],
        );
        Permission::create(
            [
                'name'=>'consulta persona id',
                'slug'=>'get_persona',
            ],
        );
        Permission::create(
            [
                'name'=>'crear empleado',
                'slug'=>'add_empleado',
            ],
        );
        Permission::create(
            [
                'name'=>'Creacion de persona empleado',
                'slug'=>'add_personaEmpleado'
            ],
        );
        Permission::create(
            [
                'name'=>'atualizacion de persona empleado',
                'slug'=>'update_personaEmpleado'
            ],
        );
        Permission::create(

            [
                'name'=>'actualizar empleado',
                'slug'=>'update_empleado',
            ],
        );
        Permission::create(

            [
                'name'=>'eliminar empleado',
                'slug'=>'delete_empleado',
            ],
        );
        Permission::create(
            [
                'name'=>'consulta empleado',
                'slug'=>'all_empleado',
            ],
        );

        Permission::create(
            [
                'name'=>'consulta empleado id',
                'slug'=>'get_empleado',
            ],
        );
        Permission::create(
            [
                'name'=>'crear sede',
                'slug'=>'add_sede',
            ],
        );
        Permission::create(
            [
                'name'=>'eliminar sede',
                'slug'=>'delete_sede',
            ],
        );
        Permission::create(

            [
                'name'=>'consutar sedes',
                'slug'=>'all_sede',
            ],
        );
        Permission::create(

        //Cargos
            [
                'name'=>'crear Cargo',
                'slug'=>'add_cargo',
            ],
        );
        Permission::create(

            [
                'name'=>'actualizar cargo',
                'slug'=>'update_cargo',
            ],
        );
        Permission::create(
            [
                'name'=>'eliminar cargo',
                'slug'=>'delete_cargo',
            ],
        );
        Permission::create(
            [
                'name'=>'cunsulta de cargo por id',
                'slug'=>'get_cargo',
            ],
        );
        Permission::create(
            [
                'name'=>'cunsulta de todos los cargo ',
                'slug'=>'all_cargo',
            ],
        );


    }
}
