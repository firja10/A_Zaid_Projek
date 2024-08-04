<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}

    <style>
        #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #1C2331;
  color: white;
}
    </style>
    <title>Laporan Pemesanan</title>
  </head>
  <body>
    <center>
        <h1>Laporan Pemesanan</h1>
    </center>





    <table id="customers">
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

        <tbody>


            @foreach ($pemesanan as $pemesananss)
            <?php
            
            $list_pesanan = str_replace(';',' - ', $pemesananss->list_data_pesanan);
            
            ?>
            <tr>
              


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

                    Nama Barista Belum Ada
                        
                    @else
                        
                        {{$pemesananss->nama_barista}}

                    @endif
                    
                </td>
                <td>
                @if ($pemesananss->status_pemesanan == 1)
                    Belum dibayar
                @elseif($pemesananss->status_pemesanan == 2)
                    Sudah Dibayar
                    <br> <br>
                    

                  
                    @elseif($pemesananss->status_pemesanan == 3)
                    Pembayaran Expired

                    @elseif($pemesananss->status_pemesanan == 4)
                    Pesanan/Pembayaran Batal
                @endif

                @if ($pemesananss->nama_barista == '' || $pemesananss->nama_barista == NULL)
      
                Tidak Ada Barista
                @endif
                    
                </td>
                <td>

                    @if ($pemesananss->bukti_bayar != NULL || $pemesananss->bukti_bayar != '')
                    <img style="width: 100px" src="{{public_path('storage/Pemesanan/'. $pemesananss->bukti_bayar)}}" alt="">
                    @else
                    Via Midtrans
                     
                    @endif
                  
                </td>

 


            </tr>

            @endforeach
         
        </tbody>
    </table>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> --}}

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>