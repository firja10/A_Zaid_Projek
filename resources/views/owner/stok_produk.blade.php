@extends('owner.template')

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
                            {{-- <h6 class="m-0 font-weight-bold text-primary">   </h6> --}}
                            {{-- <button class="btn-primary btn"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Produk</button> --}}

                            {{-- <button class="btn-primary btn" data-toggle = "modal" data-target = "#exampleModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Produk</button> --}}

                            <a href="{{url('owner/stok_produk/store')}}" class="btn btn-primary"><i class="fas fa-plus fa-sm text-white-50"></i>
                                Tambah Produk
                            </a>

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
                                            <th>Stok Total Bahan</th>
                                            <th>Gambar Produk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Kategori Produk</th>
                                            <th>Harga Produk</th>
                                            <th>Stok_Produk</th>
                                            <th>Stok Total Bahan</th>
                                            <th>Gambar Produk</th>
                                            <th>Aksi</th>
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
                                                    <ul>
                                                        
                                            
                                                    @if ($produks->stok_bahan_1 != NULL)
                                                    <?php 
                                                    $bahan_1 = DB::table('bahan_bakus')->where('kode_bahan', $produks->kode_bahan_1)->first();
                                                    ?>
                                                    <li><?php echo $bahan_1->nama_bahan?> : {{$produks->stok_bahan_1}} </li>                                                       
                                                    @elseif($produks->stok_bahan_2 != NULL)
                                                    <?php 
                                                    $bahan_2 = DB::table('bahan_bakus')->where('kode_bahan', $produks->kode_bahan_2)->first();
                                                    ?>
                                                    <li><?php echo $bahan_2->nama_bahan?> : {{$produks->stok_bahan_2}} </li>  
                                                    @elseif($produks->stok_bahan_3 != NULL)

                                                    <?php 
                                                    $bahan_3 = DB::table('bahan_bakus')->where('kode_bahan', $produks->kode_bahan_3)->first();
                                                    ?>

                                                    <li><?php echo $bahan_3->nama_bahan?> : {{$produks->stok_bahan_3}}  </li> 
                                                    @else
                                                        
                                                    @endif
                                                    </ul>
                                                </td>



                                            <td>
                                                <img src="{{asset('storage/Produk/'. $produks->image_produk) }}" alt="" style="width: 200px;">
                                                
                                                </td>
                                            <td>

                                                <a href="{{url('owner/stok_produk/' . $produks->id)}}" class="btn btn-success">
                                                    Edit Produk
                                                </a>
                                                <br><br>

                                                <form action="{{route('StokProdukDelete', $produks->id)}}" method = "POST">
                                                    @csrf
                                                    @method('DELETE')

                                                <button class="btn btn-danger" type="submit">Hapus</button>
                                                </form>


                                                

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