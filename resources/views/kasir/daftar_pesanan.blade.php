@extends('kasir.template')

@section('content')
                
                <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Pemesanan</h1>
                        <a href="{{route('CetakPesanan')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                                            <th>Tanggal Pesanan</th>
                                            <th>Nama Kasir</th>
                                            <th>Total Harga</th>
                                            <th>Nama Konsumen</th>
                                            <th>Nomor HP Konsumen</th>
                                            <th>Nama Barista</th>
                                            <th>Status Pemesanan</th>
                                            <th>Bukti Bayar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kode Pemesanan</th>
                                            <th>Data Pesanan</th>
                                            <th>Tanggal Pesanan</th>
                                            <th>Nama Kasir</th>
                                            <th>Total Harga</th>
                                            <th>Nama Konsumen</th>
                                            <th>Nomor HP Konsumen</th>
                                            <th>Nama Barista</th>
                                            <th>Status Pemesanan</th>
                                            <th>Bukti Bayar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>


                                        @foreach ($pemesanan as $pemesananss)
                                        <?php
                                        
                                        $list_pesanan = str_replace(';',' - ', $pemesananss->list_data_pesanan);
                                        
                                        ?>
                                        <tr>
                                            <form action="{{route('kasir.konfirmasi_pemesanan', $pemesananss->id)}}" method="POST">


                                            <td>{{$pemesananss->kode_pesanan}}</td>
                                            <td><?php echo $list_pesanan ?></td>
                                            <td>
                                                <?php
                                                    
                                                if (!function_exists('formatDateTime')) {
                                                    function formatDateTime($dateTimeString) {
                                                        // Mengubah string menjadi objek DateTime
                                                        $date = new DateTime($dateTimeString);
                                                        
                                                        // Mendefinisikan bulan dalam bahasa Indonesia
                                                        $monthNames = [
                                                            1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                                                            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                                                        ];
                                                        
                                                        // Mendapatkan hari, bulan, dan tahun
                                                        $day = $date->format('d');
                                                        $month = $monthNames[(int)$date->format('m')];
                                                        $year = $date->format('Y');
                                                        
                                                        // Mendapatkan jam, menit, dan detik
                                                        $time = $date->format('H:i:s');
                                                        
                                                        // Menggabungkan hasil format menjadi satu string
                                                        $formattedDate = "$day $month $year, $time";
                                                        
                                                        return $formattedDate;
                                                    }
                                                }

                                                // Contoh penggunaan
                                                $dateTimeString = $pemesananss->created_at;
                                                $formattedDateTime = formatDateTime($dateTimeString);
                                                echo $formattedDateTime; // Output: "13 Juli 2024, 02:30:06"

                                                

                                                    ?>
                                            </td>
                                            <td>
                                                @if ($pemesananss->status_pemesanan==1 || $pemesananss->status_pemesanan==2)
                                                Nama Kasir Belum Ada

                                                

                                                <input type="hidden" name="nama_kasir" value="<?php echo Auth::user()->name; ?>">
                                                @else
                                                {{$pemesananss->nama_kasir}}
                                                @endif

                                            
                                            </td>
                                            <td>{{$pemesananss->total_harga}}</td>
                                            <td>{{$pemesananss->nama_konsumen}}</td>
                                            <td>{{$pemesananss->nomor_hp_pemesanan}}</td>

                                          
                                            <td> 
                                            
                                                <?php 
                                                    
                                                    $baristas = DB::table('baristas')->get();
                                                    
                                                    ?>

                                                @if ($pemesananss->nama_barista == NULL)

                                                Silakan pilih Barista :

                                                <select name="" id="" class="form-control">
                                                    @foreach ($baristas as $barista)
                                                        <option value="{{$barista->nama_barista}}">{{$barista->nama_barista}}</option>
                                                    @endforeach
                                                </select>
                                                    
                                                @else
                                                    
                                                    {{$pemesananss->nama_barista}}

                                                @endif
                                                
                                            </td>
                                            <td>
                                            @if ($pemesananss->status_pemesanan == 1)
                                                <button class="btn-danger btn">Belum dibayar</button>
                                            @elseif($pemesananss->status_pemesanan == 2)
                                                <button class="btn-success btn">Sudah Dibayar</button>
                                                <br> <br>
                                                

                                              
                                                @elseif($pemesananss->status_pemesanan == 3)
                                                <button class="btn-success btn">Pembayaran Expired</button>

                                                @elseif($pemesananss->status_pemesanan == 4)
                                                <button class="btn-success btn">Pesanan/Pembayaran Batal</button>
                                            @endif

                                            @if ($pemesananss->nama_barista == '' || $pemesananss->nama_barista == NULL)
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-primary">Update Barista</button>
                                            @endif
                                                
                                            </td>
                                            <td>
                                                <img style="width: 100px" src="/storage/Pemesanan/<?php echo $pemesananss->bukti_bayar ?>" alt="">
                                            </td>

                                        </form>


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