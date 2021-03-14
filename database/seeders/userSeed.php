<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class userSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'eliud niebles',
            'email'=>'admin',
            'password'=>\Illuminate\Support\Facades\Hash::make('1234')
        ]);
        User::create([
            'name'=>'Mijail Gonazales',
            'email'=>'admin',
            'password'=>\Illuminate\Support\Facades\Hash::make('1234')
        ]);
    }
}
