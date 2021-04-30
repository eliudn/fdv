<?php

namespace Database\Seeders;

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
        $seeds[] = [
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
        DB::table('roles_permissions')->insert($seeds);
    }
}
