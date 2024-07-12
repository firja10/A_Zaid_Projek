<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class CreateProduksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //



        $produk = [
            [
               'nama_produk'=>'Kopi Robusta',
               'kategori_produk'=>'Kopi',
               'harga_produk'=>'20000',
                'image_produk'=>'kopi_robusta.jpg',
                'stok_produk'=>'50',
            ],

            [
                'nama_produk'=>'Kopi Arabica',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'25000',
                 'image_produk'=>'kopi_arabica.jpg',
                 'stok_produk'=>'50',
             ],
 
             [
                'nama_produk'=>'Kopi Arabica',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'25000',
                 'image_produk'=>'kopi_arabica.jpg',
                 'stok_produk'=>'150',
             ],


             [
                'nama_produk'=>'Kopi Espresso',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'20000',
                 'image_produk'=>'kopi_espresso.jpg',
                 'stok_produk'=>'100',
             ],
        
        
        
        ];
  
        foreach ($produk as $key => $value) {
            Produk::create($value);
        }







    }
}
