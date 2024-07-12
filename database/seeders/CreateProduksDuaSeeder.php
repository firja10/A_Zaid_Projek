<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateProduksDuaSeeder extends Seeder
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

            [
                'nama_produk'=>'V60',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'v60.jpg',
                 'stok_produk'=>'50',
             ],
 
             [
                'nama_produk'=>'Japanes',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'japanes.jpg',
                 'stok_produk'=>'150',
             ],

             [
                'nama_produk'=>'Vietnam Drip',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'13000',
                 'image_produk'=>'vietnam_drip.jpg',
                 'stok_produk'=>'60',
             ],


             [
                'nama_produk'=>'Espresso',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'10000',
                 'image_produk'=>'espresso.jpg',
                 'stok_produk'=>'20',
             ],

             [
                'nama_produk'=>'Kopi Susu Mabes',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'16000',
                 'image_produk'=>'susu_mabes.jpg',
                 'stok_produk'=>'150',
             ],

             [
                'nama_produk'=>'Kopi Susu 250 ml',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'18000',
                 'image_produk'=>'kopi_susu_250_ml.jpg',
                 'stok_produk'=>'70',
             ],

             [
                'nama_produk'=>'Kopi Susu 500 ml',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'35000',
                 'image_produk'=>'kopi_susu_500_ml.jpg',
                 'stok_produk'=>'90',
             ],


             [
                'nama_produk'=>'Kopi Susu 1 L',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'65000',
                 'image_produk'=>'kopi_susu_1_l.jpg',
                 'stok_produk'=>'50',
             ],

             [
                'nama_produk'=>'Creampie',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'creampie.jpg',
                 'stok_produk'=>'30',
             ],

             [
                'nama_produk'=>'Creampie 250 ml',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'18000',
                 'image_produk'=>'creampie_250_ml.jpg',
                 'stok_produk'=>'40',
             ],

             [
                'nama_produk'=>'Creampie 500 ml',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'35000',
                 'image_produk'=>'creampie_500_ml.jpg',
                 'stok_produk'=>'20',
             ],

             [
                'nama_produk'=>'Creampie 1 L',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'65000',
                 'image_produk'=>'creampie_1_l.jpg',
                 'stok_produk'=>'40',
             ],


             [
                'nama_produk'=>'Mazagran',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'mazagran.jpg',
                 'stok_produk'=>'20',
             ],


             [
                'nama_produk'=>'Longblack',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'13000',
                 'image_produk'=>'longblack.jpg',
                 'stok_produk'=>'15',
             ],

             [
                'nama_produk'=>'Americano',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'13500',
                 'image_produk'=>'americano.jpg',
                 'stok_produk'=>'25',
             ],

             [
                'nama_produk'=>'Kopi Buih',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'14000',
                 'image_produk'=>'kopi_buih.jpg',
                 'stok_produk'=>'45',
             ],

             [
                'nama_produk'=>'Capucino',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'capucino.jpg',
                 'stok_produk'=>'55',
             ],

             [
                'nama_produk'=>'Late',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'late.jpg',
                 'stok_produk'=>'60',
             ],


        
        
        
        ];
  
        foreach ($produk as $key => $value) {
            Produk::create($value);
        }



    }
}
