<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class CreateNonCoffeeSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //



        $produk = [
            [
               'nama_produk'=>'Coklat',
               'kategori_produk'=>'Non-Kopi',
               'harga_produk'=>'13000',
                'image_produk'=>'Image_Chocolate.jpg',
                'stok_produk'=>'100',
            ],

            [
                'nama_produk'=>'Red Velvet',
                'kategori_produk'=>'Non-Kopi',
                'harga_produk'=>'13000',
                 'image_produk'=>'Image_Redvelvet.jpg',
                 'stok_produk'=>'100',
             ],
 
             [
                'nama_produk'=>'Taro',
                'kategori_produk'=>'Non-Kopi',
                'harga_produk'=>'13000',
                 'image_produk'=>'Image_taro.jpg',
                 'stok_produk'=>'150',
             ],


             [
                'nama_produk'=>'Green Tea',
                'kategori_produk'=>'Non-Kopi',
                'harga_produk'=>'13000',
                 'image_produk'=>'image_Greantea.jpg',
                 'stok_produk'=>'150',
             ],

             [
                'nama_produk'=>'Thai Tea',
                'kategori_produk'=>'Non-Kopi',
                'harga_produk'=>'13000',
                 'image_produk'=>'Image_Thaitea.jpeg',
                 'stok_produk'=>'150',
             ],

             [
                'nama_produk'=>'Lemon Tea',
                'kategori_produk'=>'Non-Kopi',
                'harga_produk'=>'12000',
                 'image_produk'=>'Image_lemon tea.jpg',
                 'stok_produk'=>'150',
             ],

             [
                'nama_produk'=>'Leci Tea',
                'kategori_produk'=>'Non-Kopi',
                'harga_produk'=>'12000',
                 'image_produk'=>'Image_leci tea.jpg',
                 'stok_produk'=>'150',
             ],

             [
                'nama_produk'=>'Red Ice Vanila',
                'kategori_produk'=>'Non-Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'image_red ice vanilla.jpg',
                 'stok_produk'=>'100',
             ],

             [
                'nama_produk'=>'Coklat Ice Vanila',
                'kategori_produk'=>'Non-Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'Image_coklat ice vanilla.jpeg',
                 'stok_produk'=>'150',
             ],

             [
                'nama_produk'=>'Green Tea Ice Vanila',
                'kategori_produk'=>'Non-Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'Image_greentea Ice vanilla.jpg',
                 'stok_produk'=>'100',
             ],

             [
                'nama_produk'=>'Air Mineral',
                'kategori_produk'=>'Non-Kopi',
                'harga_produk'=>'3000',
                 'image_produk'=>'Image_air mineral.jpeg',
                 'stok_produk'=>'100',
             ],

             [
                'nama_produk'=>'Cireng Rujak',
                'kategori_produk'=>'Non-Kopi',
                'harga_produk'=>'13000',
                 'image_produk'=>'Image_cireng rujak.jpg',
                 'stok_produk'=>'150',
             ],

             [
                'nama_produk'=>'Kentang',
                'kategori_produk'=>'Non-Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'Image_Kentang.jpg',
                 'stok_produk'=>'120',
             ],

             [
                'nama_produk'=>'Kentang Sosis',
                'kategori_produk'=>'Non-Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'Image_kentang sosis.jpg',
                 'stok_produk'=>'100',
             ],

             
             [
                'nama_produk'=>'Sosis',
                'kategori_produk'=>'Non-Kopi',
                'harga_produk'=>'15000',
                 'image_produk'=>'Image_kentang sosis.jpg',
                 'stok_produk'=>'120',
             ], 
        
        
        
        ];
  
        foreach ($produk as $key => $value) {
            Produk::create($value);
        }





    }
}
