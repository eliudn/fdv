<?php

namespace Database\Seeders;

use App\Models\documentType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(userSeed::class);
        $this->call(GeneralDataSeed::class);
        $this->call(departamentSeeder::class);
        $this->call(citySeed::class);
        $this->call(documentTypeSeed::class);
        $this->call(sedeSeed::class);
        $this->call(areaSeed::class);
        $this->call(positionSeed::class);
        $this->call(permissionSeeder::class);
        $this->call(roleSeeder::class);
        $this->call(rolesPermissionsSeed::class);
        $this->call(roleUserSeed::class);

    }
}
