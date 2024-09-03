<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\Produk;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $bahan_baku = BahanBaku::all();
        return view('owner.stok_produk_id', compact('produk_id', 'bahan_baku'));


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


        'kode_bahan_1'=>$request['kode_bahan_1'],
        'stok_bahan_1'=>$request['stok_bahan_1'],
        'stok_total_1'=>$request['stok_total_1'],
        'satuan_1'=>$request['satuan_1'],


        'kode_bahan_2'=>$request['kode_bahan_2'],
        'stok_bahan_2'=>$request['stok_bahan_2'],
        'stok_total_2'=>$request['stok_total_2'],
        'satuan_2'=>$request['satuan_2'],

        'kode_bahan_3'=>$request['kode_bahan_3'],
        'stok_bahan_3'=>$request['stok_bahan_3'],
        'stok_total_3'=>$request['stok_total_3'],
        'satuan_3'=>$request['satuan_3'],



        // 'urgensitas'=>$request->urgensitas,
    ]);


    $order_produk_1 = DB::table('produks')->where('kode_bahan_1', $request['kode_bahan_1'])->first();

    $order_produk_2 = DB::table('produks')->where('kode_bahan_2', $request['kode_bahan_2'])->first();

    $order_produk_3 = DB::table('produks')->where('kode_bahan_3', $request['kode_bahan_3'])->first();




    $order_bahan_1 = DB::table('bahan_bakus')->where('kode_bahan', $request['kode_bahan_1'])->first();

    
    $order_bahan_2 = DB::table('bahan_bakus')->where('kode_bahan', $request['kode_bahan_2'])->first();

    
    $order_bahan_3 = DB::table('bahan_bakus')->where('kode_bahan', $request['kode_bahan_3'])->first();



    if ($order_produk_1->kode_bahan_1 != NULL) {
        # code...

        $total_bahan_1 = intval($order_bahan_1->stok_bahan) - intval($order_produk_1->stok_bahan_1);

    }


    if ($order_produk_1->kode_bahan_1 != NULL) {
        # code...

        $total_bahan_1 = intval($order_bahan_1->stok_bahan) - intval($order_produk_1->stok_bahan_1);

    }


    if ($order_produk_2->kode_bahan_2 != NULL) {
        # code...

        $total_bahan_2 = intval($order_bahan_2->stok_bahan) - intval($order_produk_2->stok_bahan_2);

    }


    if ($order_produk_3->kode_bahan_3 != NULL) {
        # code...

        $total_bahan_3 = intval($order_bahan_3->stok_bahan) - intval($order_produk_3->stok_bahan_3);

    }





   $bahan_1 = BahanBaku::where('kode_bahan', $order_bahan_1->kode_bahan)->update([

            'stok_bahan'=>$total_bahan_1
    
       ]);

    

    $bahan_2 = BahanBaku::where('kode_bahan', $order_bahan_2->kode_bahan)->update([

        'stok_bahan'=>$total_bahan_2

   ]);


   $bahan_3 = BahanBaku::where('kode_bahan', $order_bahan_3->kode_bahan)->update([

    'stok_bahan'=>$total_bahan_3

    ]);


    return redirect('/owner/stok_produk/'. $id)->with('update_data_produk','Data Produk Berhasil Diupdate');

  }






  public function StokProdukDelete($id) {

    $produks = Produk::findOrFail($id);
    $produks->delete();
    return redirect('/owner/stok_produk/')->with('hapus_produk','Produk Berhasil Dihapus');

  }



  public function StokProdukForm() {

    $bahan_baku = BahanBaku::all();
    return view('owner.stok_produk_store', compact('bahan_baku'));

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
