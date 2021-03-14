<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\departament;

class departamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f =fopen(public_path('csv/departamentos.csv'),'r');
        while(($data = fgetcsv($f)) !== false)
        {
            Departament::create([
                'id' => $data[1],
                'name' => $data[2],
                'detail' => $data[0]
            ]);

        }
    }
}
