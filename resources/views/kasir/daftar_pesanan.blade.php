@extends('kasir.template')

@section('content')
                
                <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Pemesanan</h1>
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

                            {{-- <a href="{{url('owner/stok_produk/' . $pemesananss->id)}}" class="btn btn-primary"><i class="fas fa-plus fa-sm text-white-50"></i>
                                Tambah Produk
                            </a> --}}

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Pemesanan</th>
                                            <th>Data Pesanan</th>
                                            <th>Nama Kasir</th>
                                            <th>Total Harga</th>
                                            <th>Nama Konsumen</th>
                                            <th>Status Pemesanan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kode Pemesanan</th>
                                            <th>Data Pesanan</th>
                                            <th>Nama Kasir</th>
                                            <th>Total Harga</th>
                                            <th>Nama Konsumen</th>
                                            <th>Status Pemesanan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>


                                        @foreach ($pemesanan as $pemesananss)
                                        <?php
                                        
                                        $list_pesanan = str_replace(';',' - ', $pemesananss->list_data_pesanan);
                                        
                                        ?>
                                        <tr>
                                            <td>{{$pemesananss->kode_pesanan}}</td>
                                            <td><?php echo $list_pesanan ?></td>
                                            <td>
                                                @if ($pemesananss->status_pemesanan==1 || $pemesananss->status_pemesanan==2)
                                                Nama Kasir Belum Ada
                                                @else
                                                {{$pemesananss->nama_kasir}}
                                                @endif

                                            
                                            </td>
                                            <td>{{$pemesananss->total_harga}}</td>
                                            <td>{{$pemesananss->nama_konsumen}}</td>
                                            <td>{{$pemesananss->status_pemesanan}}</td>
                                        </tr>

                                        @endforeach
                                     
                                    </tbody>
                                </table>
                            </div>
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






@section('modal_produk')



@endsection