<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonsumenController extends Controller
{

    public function ShowAllMenu()
    {
        $produk = Produk::all();
        return view('konsumen.show_all_menu', compact('produk'));
    }
    


    public function ShowPromoMenu()
    {

        // $produk = Produk::all();
        $produk = DB::table('produks')->where('status_promo', 1)->get();
        return view('konsumen.show_all_menu', compact('produk'));
    }

    function Konsumen_ShowKonfirmasiPemesanan($id) {
        
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
