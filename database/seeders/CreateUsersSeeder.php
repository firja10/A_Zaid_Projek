<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        $user = [
            [
               'name'=>'Konsumen',
               'email'=>'konsumen@gmail.com',
               'status_user'=>'0',
                'is_konsumen'=>'1',
                'is_kasir'=>'0',
                'is_barista'=>'0',
                'is_owner'=>'0',
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Kasir',
                'email'=>'kasir@gmail.com',
                'status_user'=>'0',
                 'is_konsumen'=>'0',
                 'is_kasir'=>'1',
                 'is_barista'=>'0',
                 'is_owner'=>'0',
                'password'=> bcrypt('123456'),
            ],
        
            [
                'name'=>'Barista',
                'email'=>'barista@gmail.com',
                'status_user'=>'0',
                 'is_konsumen'=>'0',
                 'is_kasir'=>'0',
                 'is_barista'=>'1',
                 'is_owner'=>'0',
                'password'=> bcrypt('123456'),
            ],

            [
                'name'=>'Owner',
                'email'=>'owner@gmail.com',
                'status_user'=>'0',
                 'is_konsumen'=>'0',
                 'is_kasir'=>'0',
                 'is_barista'=>'0',
                 'is_owner'=>'1',
                'password'=> bcrypt('123456'),
            ],
        
        
        
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }









    }
}
