@extends('owner.template')

@section('content')
                
                <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Stok Bahan</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>

                    <!-- Content Row -->
                    <div class="row">




                        
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            {{-- <h6 class="m-0 font-weight-bold text-primary">   </h6> --}}
                            {{-- <button class="btn-primary btn"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Produk</button> --}}

                            {{-- <button class="btn-primary btn" data-toggle = "modal" data-target = "#exampleModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Produk</button> --}}

                            {{-- <a href="{{url('owner/stok_produk/store')}}" class="btn btn-primary"><i class="fas fa-plus fa-sm text-white-50"></i>
                                Tambah Produk
                            </a> --}}

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Bahan</th>
                                            <th>Stok Bahan</th>
                                            <th>Kode Bahan</th>
                                            <th>Satuan Bahan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Bahan</th>
                                            <th>Stok Bahan</th>
                                            <th>Kode Bahan</th>
                                            <th>Satuan Bahan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>


                                        @foreach ($bahan as $bahans)

                                        <tr>
                                            <td>{{$bahans->nama_bahan}}</td>
                                            <td>{{$bahans->stok_bahan}}</td>
                                            <td>{{$bahans->kode_bahan}}</td>
                                            <td>{{$bahans->satuan_bahan}}</td>
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