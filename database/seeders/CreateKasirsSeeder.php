<?php

namespace Database\Seeders;

use App\Models\Kasir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateKasirsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $user = [
            [
               'nama_kasir'=>'Rahmat',
               'nomor_kasir'=>'010111',
            ],

            [
                'nama_kasir'=>'Rofiq',
                'nomor_kasir'=>'020111',
             ],

             [
                'nama_kasir'=>'Rohayati',
                'nomor_kasir'=>'030111',
             ],

        ];
  
        foreach ($user as $key => $value) {
            Kasir::create($value);
        }


    }
}
