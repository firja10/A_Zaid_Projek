<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateProdukPromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        $produk = [
            [
               'nama_produk'=>'Creampie 500 ml',
               'kategori_produk'=>'Kopi',
               'harga_produk'=>'31500',
                'image_produk'=>'image_creampie 500ml.JPG',
                'stok_produk'=>'50',

                'deskripsi_produk'=>'Kopi yang dipadukan dengan susu yang creamy dan ma...',

                
            ],

            [
                'nama_produk'=>'Kopi Susu 1 L',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'Image_V60.jpg',
                 'stok_produk'=>'50',

                 'deskripsi_produk'=>'Biji kopi yang disaring dengan porta filter dan diseduh dengan air panas',

             ],


        
        ];
  
        foreach ($produk as $key => $value) {
            Produk::create($value);
        }


        

    }
}
