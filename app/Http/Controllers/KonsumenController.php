<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Order;
use App\Models\Pemesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Services\Midtrans\CreateSnapTokenService;

class KonsumenController extends Controller
{

    public function ShowAllMenu()
    {
        // $produk = Produk::all();
        $produk = DB::table('produks')->where('stok_produk', '>', 0)->get();
        return view('konsumen.show_all_menu', compact('produk'));
    }


    public function ShowKopiMenu()
    {
        $produk = DB::table('produks')->where('stok_produk', '>', 0)->where('kategori_produk', 'Kopi')->get();
        return view('konsumen.show_kopi_menu', compact('produk'));
    }


    public function ShowNonKopiMenu()
    {
        $produk = DB::table('produks')->where('stok_produk', '>', 0)->where('kategori_produk', 'Non-Kopi')->get();
        return view('konsumen.show_nonkopi_menu', compact('produk'));
    }
    
    


    public function ShowPromoMenu()
    {

        // $produk = Produk::all();
        $produk = DB::table('produks')->where('status_promo', 1)->where('stok_produk', '>', 0 )->get();
        return view('konsumen.show_promo_menu', compact('produk'));
    }




   public function Konsumen_ShowKonfirmasiPemesanan($id) {
        
        

        $pemesanan_id = Pemesanan::findOrFail($id);

        $order = DB::table('orders')->where('number', $pemesanan_id->kode_pesanan)->first();

        $snapToken = $order->snap_token;
        if (is_null($snapToken)) {
            // If snap token is still NULL, generate snap token and save it to database

            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();

            // $order->snap_token = $snapToken;
            // $order->save();

            Order::where('number', $order->number)->update([

                'snap_token'=>$snapToken

            ]);


        }

        return view('konsumen.konfirmasi_pemesanan', compact('pemesanan_id', 'order', 'snapToken'));

                // return view('konsumen.konfirmasi_pemesanan', compact('pemesanan_id'));



    }


    


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Konsumen $konsumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konsumen $konsumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konsumen $konsumen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konsumen $konsumen)
    {
        //
    }
}
