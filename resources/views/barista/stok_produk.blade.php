@extends('barista.template')

@section('content')
                
                <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Stok Produk</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">




                        
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Kategori Produk</th>
                                            <th>Harga Produk</th>
                                            <th>Stok_Produk</th>
                                            <th>Gambar Produk</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Kategori Produk</th>
                                            <th>Harga Produk</th>
                                            <th>Stok_Produk</th>
                                            <th>Gambar Produk</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>


                                        @foreach ($produk as $produks)
                                        <tr>
                                            <td>{{$produks->nama_produk}}</td>
                                            <td>{{$produks->kategori_produk}}</td>
                                            <td>
                                                
                                                <?php 
                                                    
                                                    $harga_konversi = number_format($produks->harga_produk,2,',','.');
                                                    
                                                    ?>

                                                Rp. <?php echo $harga_konversi ?></td>
                                            <td><?php 
                                            
                                            $nama_produk = DB::table('produks')->where('nama_produk', $produks->nama_produk)->count();
                                            echo $nama_produk;
                                            ?></td>
                                            <td>
                                                <img src="{{asset('storage/Produk/'. $produks->image_produk) }}" alt="" style="width: 200px;">
                                                
                                                </td>

                                        </tr>

                                        @endforeach
                                        
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>





                    {{-- Nyoba QR Code --}}

                    {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(256)->generate('https://google.com')) !!} "> --}}
        

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






@section('modal_produk')



@endsection