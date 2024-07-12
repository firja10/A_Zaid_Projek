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