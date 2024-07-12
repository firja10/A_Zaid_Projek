<?php

namespace App\Http\Controllers;

use App\Models\Produk;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProdukController extends Controller
{
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



    public function showQR()
    {
        return QrCode::generate(
            'Hello, World!',
        );
    }



    
    public function ShowQRMenu()
    {
        return view('konsumen.QRMenu');
    }







    public function StokProduk()
    {
        //
        $produk = Produk::all();
        return view('owner.stok_produk', compact('produk'));

    }


    public function StokProdukEdit($id)
    {

        $produk_id = Produk::findOrFail($id);
        return view('owner.stok_produk_id', compact('produk_id'));


    }




  public function StokProdukUpdate($id, Request $request) {

    if($request->hasFile('image_produk'))
    {

    $filename = $request['image_produk']->getClientOriginalName();
    
    if(Produk::find($id)->image_produk)
    {

        Storage::delete('/public/storage/Produk/'.Produk::find($id)->image_produk);

    }

    $request['image_produk']->storeAs('Produk', $filename, 'public'); }

    else {
        $filename=Produk::find($id)->image_produk;
    }

    $orders = Produk::where('id', $id)->update([
        'nama_produk' => $request['nama_produk'],
        'harga_produk'=> $request['harga_produk'],        
        'stok_produk'=> $request['stok_produk'],
        'kategori_produk'=>  $request['kategori_produk'],
        'image_produk' =>$filename,
        // 'urgensitas'=>$request->urgensitas,
    ]);

    return redirect('/owner/stok_produk/'. $id)->with('update_data_produk','Data Produk Berhasil Diupdate');

  }






  public function StokProdukDelete($id) {

    $produks = Produk::findOrFail($id);
    $produks->delete();
    return redirect('/owner/stok_produk/')->with('hapus_produk','Produk Berhasil Dihapus');

  }



  public function StokProdukForm() {


    return view('owner.stok_produk_store');


  }


  public function StokProdukStore(Request $request) {

    $produks = new Produk();
    
    if($request->hasFile('image_produk'))
    {
        $filename = $request['image_produk']->getClientOriginalName();


        $request["image_produk"]->storeAs('Produk', $filename, 'public');
    }




    $produks['nama_produk'] = $request->nama_produk;
    
    $produks['kategori_produk'] = $request->kategori_produk;
    $produks['harga_produk'] = $request->harga_produk;
    $produks['stok_produk'] = $request->stok_produk;
    $produks['image_produk'] = $filename;

    $produks->save();
    return redirect('/konsumen/ShowQRMenu')->with('tambah_pesanan','Pesanan Berhasil Ditambahkan');

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
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
