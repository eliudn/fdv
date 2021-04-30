<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roleUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $seeds[] = [
            'user_id' => '1',
            'role_id' => '1',
        ];
        DB::table('users_roles')->insert($seeds);
    }
}
