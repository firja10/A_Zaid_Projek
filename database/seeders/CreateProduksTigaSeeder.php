<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateProduksTigaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //



        $produk = [
            [
               'nama_produk'=>'Kopi Tubruk',
               'kategori_produk'=>'Kopi',
               'harga_produk'=>'10000',
                'image_produk'=>'tubruk.jpg',
                'stok_produk'=>'50',
            ],        
        
        ];
  
        foreach ($produk as $key => $value) {
            Produk::create($value);
        }





    }
}
