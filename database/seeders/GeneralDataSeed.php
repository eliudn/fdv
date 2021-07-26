<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralDataSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ### tipo de sangle
            [
                 'name'=>'O +',
                 'slug'=>'O pisitivo',
                 'table_iden' =>'blood_type'
            ],
            [
                'name'=>'O -',
                'slug'=>'O negativo',
                'table_iden' =>'blood_type'
           ],
           [
                'name'=>'A +',
                'slug'=>'A positivo',
                'table_iden' =>'blood_type'
            ],

            [
                'name'=>'A -',
                'slug'=>'A negativo',
                'table_iden' =>'blood_type'
             ],
             [
                'name'=>'B +',
                'slug'=>'B positivo',
                'table_iden' =>'blood_type'
            ],
            [
               'name'=>'B -',
               'slug'=>'B negativo',
               'table_iden' =>'blood_type'
            ],
           [
              'name'=>'AB +',
              'slug'=>'AB positivo',
              'table_iden' =>'blood_type'
            ],
            [
               'name'=>'AB -',
               'slug'=>'AB negativo',
               'table_iden' =>'blood_type'
             ],
             ###  Estado civil
            [
                'name'=>'Casado(a)',
                'slug'=>'',
                'table_iden' =>'marital_status'
            ],
            [
                'name'=>'Separado(a) judicialmente',
                'slug'=>'',
                'table_iden' =>'marital_status'
            ],
            [
                'name'=>'Divorciado(a)',
                'slug'=>'',
                'table_iden' =>'marital_status'
            ],
            [
                'name'=>'Soltero(a)',
                'slug'=>'',
                'table_iden' =>'marital_status'
            ],
            [
                'name'=>'Conviviente Civil',
                'slug'=>'',
                'table_iden' =>'marital_status'
            ],




        ];

        foreach ($data as $index => $d)
        {
            DB::insert('insert into general_data (name, slug, table_iden) values (?, ?, ?)', [$d["name"], $d["slug"], $d["table_iden"]]);


        }




    }
}
