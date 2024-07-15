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
                'image_produk'=>'Image_kopi tubruk.jpg',
                'stok_produk'=>'50',

                'deskripsi_produk'=>'Biji kopi yang disajikan dengan air panas',

                
            ],

            [
                'nama_produk'=>'V60',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'Image_V60.jpg',
                 'stok_produk'=>'50',

                 'deskripsi_produk'=>'Biji kopi yang disaring dengan porta filter dan diseduh dengan air panas',

             ],
 
             [
                'nama_produk'=>'Japanes',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'image_japanes.jpg',
                 'stok_produk'=>'150',

                 'deskripsi_produk'=>'Biji kopi yang disaring dengan porta filter dan diseduh dengan air panas, kemudian didinginkan dengan cara ditambahkan es batu',

             ],

             [
                'nama_produk'=>'Vietnam Drip',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'13000',
                 'image_produk'=>'Image_vietnam drip.jpg',
                 'stok_produk'=>'60',

                 'deskripsi_produk'=>'Metode penyeduhan kopi dengan dripper dan disajikan dengan susu kental manis',



             ],


             [
                'nama_produk'=>'Espresso',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'10000',
                 'image_produk'=>'image_espresso.jpg',
                 'stok_produk'=>'20',

                 'deskripsi_produk'=>'Kopi yang dihasilkan dari proses penyeduhan kopi dengan tekanan dan suhu tinggi',

             ],

             [
                'nama_produk'=>'Kopi Susu Mabes',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'16000',
                 'image_produk'=>'image_kopi susu mabes.jpg',
                 'stok_produk'=>'150',

                 'deskripsi_produk'=>'Kopi yang dipadukan dengan susu yang creamy dan manisnya gula aren',

             ],

             [
                'nama_produk'=>'Kopi Susu 250 ml',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'18000',
                 'image_produk'=>'Image_kopi susu 250ml.jpg',
                 'stok_produk'=>'70',

                 'deskripsi_produk'=>'Kopi yang dipadukan dengan susu yang creamy dan manisnya gula aren',

             ],

             [
                'nama_produk'=>'Kopi Susu 500 ml',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'35000',
                 'image_produk'=>'image_kopi susu 500ml.JPG',
                 'stok_produk'=>'90',

                 'deskripsi_produk'=>'Kopi yang dipadukan dengan susu yang creamy dan manisnya gula aren',

             ],


             [
                'nama_produk'=>'Kopi Susu 1 L',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'65000',
                 'image_produk'=>'image_kopi susu 1L.jpg',
                 'stok_produk'=>'50',

                 
                 'deskripsi_produk'=>'Kopi yang dipadukan dengan susu yang creamy dan manisnya gula aren',


             ],

             [
                'nama_produk'=>'Creampie',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'image_creampie.jpg',
                 'stok_produk'=>'30',

                 'deskripsi_produk'=>'Kopi yang dipadukan dengan susu yang creamy dan manisnya susu kental manis',


             ],

             [
                'nama_produk'=>'Creampie 250 ml',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'18000',
                 'image_produk'=>'image_creampie 250ml.jpg',
                 'stok_produk'=>'40',

                 'deskripsi_produk'=>'Kopi yang dipadukan dengan susu yang creamy dan manisnya susu kental manis',


             ],

             [
                'nama_produk'=>'Creampie 500 ml',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'35000',
                 'image_produk'=>'image_creampie 500ml.JPG',
                 'stok_produk'=>'20',

                 'deskripsi_produk'=>'Kopi yang dipadukan dengan susu yang creamy dan manisnya susu kental manis',


             ],

             [
                'nama_produk'=>'Creampie 1 L',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'65000',
                 'image_produk'=>'image_creampie 1L.jpg',
                 'stok_produk'=>'40',

                 'deskripsi_produk'=>'Kopi yang dipadukan dengan susu yang creamy dan manisnya susu kental manis',


             ],


             [
                'nama_produk'=>'Mazagran',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'image_Mazagran (Kopi Lemon).jpg',
                 'stok_produk'=>'20',

                 'deskripsi_produk'=>'Kopi lemon yang menyegarkan',


             ],


             [
                'nama_produk'=>'Longblack',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'13000',
                 'image_produk'=>'image_longblack .jpg',
                 'stok_produk'=>'15',

                 'deskripsi_produk'=>'Kopi hitam dengan kandungan air yang sedikit',


             ],

             [
                'nama_produk'=>'Americano',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'13500',
                 'image_produk'=>'image_americano.jpg',
                 'stok_produk'=>'25',

                 'deskripsi_produk'=>'Kopi hitam dengan kandungan air lebih banyak',


             ],

             [
                'nama_produk'=>'Kopi Buih',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'14000',
                 'image_produk'=>'image_kopi buih.jpg',
                 'stok_produk'=>'45',

                 'deskripsi_produk'=>'Kopi hitam yang di shaker dipadukan dengan gula',


             ],

             [
                'nama_produk'=>'Capucino',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'Image_capucino.jpg',
                 'stok_produk'=>'55',

                 'deskripsi_produk'=>'Perpaduan sempurna antara espresso, susu dan lapisan busa',


             ],

             [
                'nama_produk'=>'Late',
                'kategori_produk'=>'Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'Image_late.jpg',
                 'stok_produk'=>'60',

                 'deskripsi_produk'=>'Perpaduan sempurna antara espresso dengan susu dan memiliki lapisan busa yang tipis',


             ],


        
        
        
        ];
  
        foreach ($produk as $key => $value) {
            Produk::create($value);
        }



    }
}
