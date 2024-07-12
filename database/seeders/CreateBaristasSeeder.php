<?php

namespace Database\Seeders;

use App\Models\Barista;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateBaristasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $user = [
            [
               'nama_barista'=>'Firja',
               'nomor_barista'=>'010112',
            ],

            [
                'nama_barista'=>'Fakih',
                'nomor_barista'=>'020112',
             ],

             [
                'nama_barista'=>'Frida',
                'nomor_barista'=>'030112',
             ],

        ];
  
        foreach ($user as $key => $value) {
            Barista::create($value);
        }


    }
}
