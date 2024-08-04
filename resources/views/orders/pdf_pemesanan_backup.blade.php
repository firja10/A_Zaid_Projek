<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Laporan Pemesanan</title>
  </head>
  <body>
    <h1>Laporan Pemesanan</h1>




   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Pemesanan</th>
                                            <th>Data Pesanan</th>
                                            <th>Tanggal Pesanan</th>
                                            <th>Nama Kasir</th>
                                            <th>Total Harga</th>
                                            <th>Nama Konsumen</th>
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



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>