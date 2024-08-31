@extends('owner.template')

@section('content')
                
                <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Stok Produk</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">




                        
                    <!-- DataTales Example -->
                    {{-- <div class="card shadow mb-8"> --}}
                        <div class="card shadow mb-8" style="width:100%">
                        <div class="card-header py-3">
                            {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
                        </div>

                        
                        <div class="card-body" >
                  
                            <form class="user" method="POST" action="{{route('StokProdukStore')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">

                                    <br> <br>
                                    <label for="image_produk">Gambar Produk</label>
                                    <input type="file" name="image_produk" id="image_produk">

                                </div>
                               
                                 <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                <input id="nama_produk" type="text" class="form-control" placeholder="Nama Produk" name="nama_produk" id="nama_produk">
                                 </div>
                                 

                                 <div class="form-group">
                                    <label for="kategori_produk">Kategori Produk</label>
                                    <input type="text" class="form-control" placeholder="Kategori Produk" name="kategori_produk" id="kategori_produk">
                                     </div>


                                 <div class="form-group">
                                    <label for="harga_produk">Harga Produk</label>
                                    <input type="number" class="form-control" placeholder="Harga Produk (Rp.)" name="harga_produk" id="harga_produk">
                                 </div>

                                 <div class="form-group">
                                    <label for="stok_produk">Stok Produk</label>
                                    <input type="number" class="form-control" placeholder="Stok Produk" name="stok_produk" id="stok_produk">
                                 </div>




                                <div class="form-group">
                                <label for="kode_bahan_1">Nama Bahan 1</label>
                                <select class="form-control" name="kode_bahan_1" id="kode_bahan_1">                                   
                                    @foreach ($bahan_baku as $bahan_bakus)
                                        <option value="{{$bahan_bakus->kode_bahan}}">{{$bahan_bakus->nama_bahan}}</option>
                                    @endforeach
                                </select>
                                </div>

                                <div class="form-group">
                                    <label for="stok_bahan_1">Stok Satuan Bahan 1</label>
                                    <input class="form-control" type="number" name="stok_bahan_1" id="stok_bahan_1">
                                </div>

                                <div class="form-group">
                                    <label for="stok_total_1">Stok Total Bahan 1</label>
                                    <input class="form-control" type="number" name="stok_total_1" id="stok_total_1">
                                </div>

                                <div class="form-group">
                                    <label for="satuan_1">Satuan Bahan 1</label>
                                    <input class="form-control" type="text" name="satuan_1" id="satuan_1">
                                </div>

                                

                                <div class="form-group">
                                    <label for="kode_bahan_2">Nama Bahan 2</label>
                                    <select class="form-control"  name="kode_bahan_2" id="kode_bahan_2">                                   
                                        @foreach ($bahan_baku as $bahan_bakus)
                                            <option value="{{$bahan_bakus->kode_bahan}}">{{$bahan_bakus->nama_bahan}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="stok_bahan_2">Stok Satuan Bahan 2</label>
                                    <input class="form-control" type="number" name="stok_bahan_2" id="stok_bahan_2">
                                </div>

                                <div class="form-group">
                                    <label for="stok_total_2">Stok Total Bahan 2</label>
                                    <input class="form-control" type="number" name="stok_total_2" id="stok_total_2">
                                </div>

                                <div class="form-group">
                                    <label for="satuan_2">Satuan Bahan 2</label>
                                    <input class="form-control" type="text" name="satuan_2" id="satuan_2">
                                </div>



    
                                <div class="form-group">
                                    <label for="kode_bahan_3">Nama Bahan 3</label>
                                    <select class="form-control" name="kode_bahan_3" id="kode_bahan_3">                                   
                                        @foreach ($bahan_baku as $bahan_bakus)
                                            <option value="{{$bahan_bakus->kode_bahan}}">{{$bahan_bakus->nama_bahan}}</option>
                                        @endforeach
                                    </select>
                                </div>
    


                                <div class="form-group">
                                    <label for="stok_bahan_3">Stok Satuan Bahan 3</label>
                                    <input class="form-control" type="number" name="stok_bahan_3" id="stok_3">
                                </div>

                                <div class="form-group">
                                    <label for="stok_total_3">Stok Total Bahan 3</label>
                                    <input class="form-control" type="number" name="stok_total_3" id="stok_total_3">
                                </div>

                                <div class="form-group">
                                    <label for="satuan_3">Satuan Bahan 3</label>
                                    <input class="form-control" type="text" name="satuan_3" id="satuan_3">
                                </div>


                        






                                 <button class="btn-primary btn btn-user btn-block" type="submit">Submit</button>

                                 <hr>
                             </form>




                        </div>
                    </div>
        




            
           




                    </div>









                            <!-- Color System -->
                            <div class="row">

   
 
                                
                           
                            </div>

                        </div>













                        <div class="col-lg-6 mb-4">

        

             

                        </div>
                    </div>


                    

                </div>
                <!-- /.container-fluid -->



@endsection