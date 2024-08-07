<!DOCTYPE html>
<html>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Daftar Menu</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- font css -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   </head>
   <body>
      <div class="header_section header_bg">
         <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a class="navbar-brand"href="index.html"><h2 class="address_text">MABES KOPI</h2></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">

                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{url('/login')}}">Login</a>
                     </li>
                     {{-- <li class="nav-item">
                        <a class="nav-link" href="{{url('/ShowQRMenu')}}">Daftar Menu</a>
                     </li> --}}
 
                     <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                     </li>
                  </ul>


                  <form class="form-inline my-2 my-lg-0">
                     <div class="login_bt">
                        <ul>
                           <li><a href="#"><span class="user_icon"><i class="fa fa-user" aria-hidden="true"></i></span>Login</a></li>
                           <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </form>
               </div>
            </nav>
         </div>
      </div>
      <!-- header section end -->
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <div class="row">

               <div class="col-md-12">

                  @if ($message = Session::get('success'))
                  <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                   <strong>{{ $message }}</strong>
                  </div>
                @endif


                <div class="text-center">
                    <h1 class="contact_taital">INVOICE KODE PESANAN {{$pemesanan_id->kode_pesanan}}</h1>
                </div>
                  <br>
                  <center>

                    {{-- <form action=""> --}}


                        <table class="table" id="tabel_pesanan">
 
                            <thead>
                               <tr>
                               <th>Data Pesanan</th>
                               <th>Harga Pesanan</th>
                               <tr>
                            </thead>
       
                            <?php 
                            
                            $pesanan_list = explode(';', $pemesanan_id->list_data_pesanan);
                            

                            ?>

                            <tbody id="nilai_pesanan">
                                <?php foreach ($pesanan_list as $value) {
                                    # code...
                                
                                    $pesanan_harga = DB::table('produks')->where('nama_produk', $value)->first();
                                ?>
                               <tr>
                               <td><?php echo $value  ?></td>
                               <td><?php echo 'Rp. '. number_format($pesanan_harga->harga_produk, 2, ",", ".")  ?></td>
                               <tr>
                                <?php  } ?>
                            </tbody>
                         <tr>
                            <th>Total Harga:</th>
                            <td id="totalHarga">Rp. <?php echo number_format($pemesanan_id->total_harga, 2, ",", ".") ?></td>
                         </tr>
                         <tr>
                            <th>Metode Pembayaran:</th>
                            <td><?php echo $pemesanan_id->pembayaran;
                             ?></td>
                         </tr>

                         <tr>
                           <th>Tanggal Pemesanan:</th>
                           <td><?php
                           


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
                                                   $dateTimeString = $pemesanan_id->created_at;
                                                   $formattedDateTime = formatDateTime($dateTimeString);
                                                   echo $formattedDateTime; // Output: "13 Juli 2024, 02:30:06"
                                                      ?>
  

                            </td>
                        </tr>

                         <tr>
                            <th>Status Pesanan:</th>
                            <td><?php
                            
                            if ($pemesanan_id->status_pemesanan == 1) {
                                # code...

                                echo "<button class ='btn btn-danger' >Belum Bayar</button>";

                            } elseif ($pemesanan_id->status_pemesanan == 2) {
                                # code...
                                $actual_link = "https://$_SERVER[HTTP_HOST]";

                                echo "<button class ='btn btn-success' >Sudah Dibayar</button>";
                                echo "</br>";
                            
                              //   echo $actual_link;

                            }elseif ($pemesanan_id->status_pemesanan == 3) {
                                # code...
                                echo "<button class ='btn btn-warning' >Sudah Kedaluarsa</button>";

                            } elseif ($pemesanan_id->status_pemesanan == 4) {
                                # code...
                                echo "<button class ='btn btn-warning' >Sudah Dibatalkan</button>";
                            }



                         
                             ?></td>

                         </tr>
                         <tr>
                           <th>Nama Pemesan</th>
                           <td>{{$pemesanan_id->nama_konsumen}}</td>
                         </tr>

                         <tr>
                           <th>Nomor HP Pemesan</th>
                           <td>{{$pemesanan_id->nomor_hp_pemesanan}}</td>
                         </tr>
       
                         </table>


                         <h5><?php
                         
                         if ($pemesanan_id->pembayaran == 'BCA_TF') {
                            # code...
                            echo "Silakan lakukan Pembayaran dengan Transfer atas nama berikut : ";
                            echo "</br>";
                            echo "787798878 a.n Zaid Ishmatul";
                            echo "</br>";
                            echo "Setelah melakukan pembayaran, silakan upload di sini :";
                            ?>

                            <form action="{{route('KonfirmasiPesanan', $pemesanan_id->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="form-control">
                                    <label for="bukti_bayar">Bukti Pembayaran</label>
                                    <input type="file" name="bukti_bayar" id="bukti_bayar">
                                 </div>
                                 <br>
                                 <?php if($pemesanan_id->status_pemesanan == 1) {?>
                                 <button type="submit" class="btn btn-primary">Konfirmasi Bukti Bayar</button>
                                 <?php } else {?>
                                    <button type="submit" class="btn btn-primary" disabled>Konfirmasi Bukti Bayar</button>
                                    
                                 <?php  }?>
                                 
                            </form>



                       <?php  }

                         elseif($pemesanan_id->pembayaran == 'Cash') {
                            echo "Silakan lakukan Pembayaran di Kasir ";
                         }
                                                          
                              elseif ($pemesanan_id->pembayaran == 'Online') {
                           ?>            

                              @if ($order->payment_status == 1)
                              <button class="btn btn-primary" id="pay-button">Lakukan Pembayaran</button>
                              @elseif($order->payment_status == 2)
                              Pembayaran Berhasil
                              @elseif($order->payment_status == 3)
                              Kedaluarsa
                              @elseif($order->payment_status == 4)
                              Dibatalkan
                              @endif

                           <?php
                        } ?>









                    
                        </h5>


                    {{-- </form> --}}





                  </center>
               </div>






            </div>
         </div>

         <br>





      </div>
      <!-- contact section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="address_text">Address</h1>
                  <p class="footer_text">here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use </p>
                  <div class="location_text">
                     <ul>
                        <li>
                           <a href="#">
                           <i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_10">+01 1234567890</span>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                           <i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left_10">demo@gmail.com</span>
                           </a>
                        </li>
                     </ul>
                  </div>
                  <div class="form-group">
                     <textarea class="update_mail" placeholder="Your Email" rows="5" id="comment" name="Your Email"></textarea>
                     <div class="subscribe_bt"><a href="#"><img src="images/teligram-icon.png"></a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-sm-12">
                  <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free Html Templates</a></p>
               </div>
               <div class="col-lg-6 col-sm-12">
                  <div class="footer_social_icon">
                     <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->


      
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.sandbox_client_key') }}">
    </script>
    <script>
        const payButton = document.querySelector('#pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault();

            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                }
            });
        });
    </script>


      <script src="{{asset('js/jquery.min.js')}}"></script>
      <script src="{{asset('js/popper.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('js/custom.js')}}"></script>
   </body>
</html>
