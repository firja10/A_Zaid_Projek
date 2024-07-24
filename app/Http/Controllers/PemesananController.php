<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Produk;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function PesanMenu(Request $request)
    {
        //

        $pesanan_ex = explode(';', $request->list_data_pesanan);

        $pemesanan = new Pemesanan();

        $pemesanan['list_data_pesanan'] = $request->list_data_pesanan;
        // $pemesanan['kode_pesanan'] = $request->kode_pesanan;
        $pemesanan['nama_kasir'] = $request->nama_kasir;
        $pemesanan['total_harga'] = $request->total_harga;
        $pemesanan['pembayaran'] = $request->pembayaran;
        $pemesanan['status_pemesanan'] = $request->status_pemesanan;
        $pemesanan['id_produk'] = $request->id_produk;
        $pemesanan['id_konsumen'] = $request->id_konsumen;
        $pemesanan['nama_konsumen'] = $request->nama_konsumen;
        
        $pemesanan['nomor_hp_pemesanan'] = $request->nomor_hp_pemesanan;

        

        $pemesanan['id_kasir'] = $request->id_kasir;
        $pemesanan['id_barista'] = $request->id_barista;
        $pemesanan['nama_barista'] = $request->nama_barista;

    

        $pemesanan->save();

        $id_pesan = $pemesanan['id'];
        $kode_pesanan = 'MA - ' . strval($id_pesan);

        Pemesanan::where('id', $id_pesan)->update([

            'kode_pesanan'=>$kode_pesanan

        ]);


        foreach ($pesanan_ex as $key_produk) {
            # code...

            $produk_hitung = DB::table('produks')->where('nama_produk', $key_produk)->count();

            $produk_cocok = DB::table('produks')->where('nama_produk', $key_produk)->first();

            $stok_prod = $produk_cocok->stok_produk;

            $stok_sisa = (int)$stok_prod - (int)$produk_hitung;


            Produk::where('nama_produk', $key_produk)->update([

                'stok_produk'=>$stok_sisa,

            ]);
        }



        return redirect('/konsumen/Konfirmasi_Pemesanan/'. $id_pesan)->with('tambah_produk','Produk Berhasil Ditambahkan');


    }




    public function KonfirmasiPesanan($id, Request $request)
    {
        //


        if($request->hasFile('bukti_bayar'))
        {
    
        $filename = $request['bukti_bayar']->getClientOriginalName();
        
        if(Pemesanan::find($id)->bukti_bayar)
        {
    
            Storage::delete('/public/storage/Pemesanan/'.Pemesanan::find($id)->bukti_bayar);
    
        }
    
        $request['bukti_bayar']->storeAs('Pemesanan', $filename, 'public'); }
    
        else {
            $filename=Pemesanan::find($id)->image_produk;
        }




        $pemesanans = Pemesanan::where('id', $id)->update([

            'status_pemesanan' => 2,
            'bukti_bayar'=>$filename,
  

        ]);


    
        return redirect('/konsumen/Konfirmasi_Pemesanan/'.$id)->with(['success' => 'Silakan Menunggu Konfirmasi Terlebih dahulu']);

        // return redirect('/konsumen/ShowAllMenu')->with(['success' => 'Silakan Menunggu Konfirmasi Terlebih dahulu']);


    }



    public function Bayar_QRIS($id) {

        $transaction_id = Transaction::findOrFail($id);

        return view('konsumen.pembayaran_QRIS', compact('transaction_id'));

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
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
