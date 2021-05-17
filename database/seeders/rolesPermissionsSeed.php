<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rolesPermissionsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::find(1);
        $permission = Permission::all();

        foreach ($permission as $index=> $p){
            $role->permissions()->attach($p->id);
        }



        /*
         * $seeds[] = [
            'role_id' => '1',
            'permission_id' => '1',
        ];
        $seeds[] = [
            'role_id' => '1',
            'permission_id' => '2',
        ];
        $seeds[] = [
            'role_id' => '1',
            'permission_id' => '3',
        ];
        $seeds[] = [
            'role_id' => '1',
            'permission_id' => '4',
        ];

        //Rol General
        $seeds[] = [
            'role_id' => '3',
            'permission_id' => '16',
        ];
        $seeds[] = [
            'role_id' => '3',
            'permission_id' => '17',
        ];
        $seeds[] = [
            'role_id' => '3',
            'permission_id' => '19',
        ];
          DB::table('roles_permissions')->insert($seeds);
         */





    }
}
