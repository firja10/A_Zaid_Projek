<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use App\Models\Pemesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function Kasir_ShowPemesanan(){

        $pemesanan = Pemesanan::all();

        return view('kasir.daftar_pesanan', compact('pemesanan'));

    }


    public function Kasir_ShowSpesifikPemesanan($id){

        $pemesanan_id = Pemesanan::findOrFail($id);

        return view('kasir.daftar_pesanan_id', compact($pemesanan_id));

    }


    public function Kasir_KonfirmasiPembayaran($id, Request $request){


        
        Pemesanan::where('id', $id)->update([
            'status_pemesanan'=>3,
            'nama_barista'=>$request['nama_barista'],
            'nama_kasir'=>$request['nama_kasir'],
            
        ]);

        return redirect('kasir/ShowPemesanan')->with(['sukses_konfirmasi_bayar'=>'Pembayaran telah dikonfirmasi']);

    }



    public function Kasir_StokProduk() 
    {
        $produk = Produk::all();
        return view('kasir.stok_produk', compact('produk'));
    }


    





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kasir $kasir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kasir $kasir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kasir $kasir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kasir $kasir)
    {
        //
    }
}
