<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\city;
class citySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $f =fopen(public_path('csv/municipios.csv'),'r');
        while(($data = fgetcsv($f)) !== false)
        {
            city::create([
                'id' => $data[1],
                'departamet_id' => $data[0],
                'name' => $data[2]
            ]);

        }
    }
}
