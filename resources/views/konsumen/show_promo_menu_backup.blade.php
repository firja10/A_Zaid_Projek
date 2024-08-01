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
      <title>Daftar Promo Menu</title>
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




                     <!-- coffee section start -->
      <div class="coffee_section layout_padding">
         <div class="container">
            <div class="row">
               <h1 class="coffee_taital">OUR PROMO MENU OFFER</h1>
               <div class="bulit_icon"><img src="{{asset('images/bulit-icon.png')}}"></div>
            </div>

            <br>
            <center>

               <form action="{{route('PesanMenu')}}" method="POST">
                  @csrf
                  {{-- <textarea class="form-control" name="list_data_pesanan" id="hiddenInput" cols="30" rows="10"></textarea> --}}
                  {{-- <textarea class="form-control" name="list_data_harga" id="hiddenInputHarga" cols="30" rows="10"></textarea> --}}
                  {{-- <input type="hidden" name="list_data_pesanan" id="hiddenInput"> --}}
                  <input type="hidden" name="list_data_harga" id="hiddenInputHarga">
                  {{-- <button class="btn btn-danger" type="submit">Masukkan Keranjang</button> --}}
               </form>

               <a class="btn btn-secondary" href="{{url('konsumen/ShowKopiMenu')}}">Menu Kopi</a>
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Konfirmasi Pesanan</button>
               <a class="btn btn-warning" href="{{url('konsumen/ShowNonKopiMenu')}}">Menu Non-Kopi</a>
            </center>

         </div>
         <div class="coffee_section_2">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">

                  <div class="carousel-item active">
                     <div class="container-fluid">
                        <div class="row">


                           @foreach ($produk as $produks)
                           <div class="col-lg-3 col-md-6">
                              <div class="coffee_img"><img src="{{asset('storage/Produk/'. $produks->image_produk)}}"></div>
                              <h3 class="types_text">{{$produks->nama_produk}}</h3>
                              <h4>Diskon 10 % </h4>
                              <p class="looking_text">{{$produks->kategori_produk}} - Rp. {{$produks->harga_promo}}</p>
                              {{-- <div class="read_bt"></div> --}}
                              <p>{{$produks->deskripsi_produk}}</p>
                              <center><button class="btn btn-success" onclick="addValue('<?php echo $produks->nama_produk ?>','textarea<?php echo $produks->id ?>', '<?php echo $produks->harga_promo ?>', 'button<?php echo $produks->id ?>')">Pesan</button></center>
                               <br>
                              <center><button disabled class="btn btn-danger" id="button<?php echo $produks->id ?>" onclick="removeValue('<?php echo $produks->nama_produk ?>','textarea<?php echo $produks->id ?>', '<?php echo $produks->harga_promo ?>', 'button<?php echo $produks->id ?>')">Hapus Pesanan</button></center>
                             
                              {{-- <p id="textareaId"></p> --}}
                              <p id="textarea{{$produks->id}}"></p>
                        
                           </div>
                           @endforeach


                        </div>
                     </div>
                  </div>

                  
                  {{-- <div class="carousel-item">
                     <div class="container-fluid">
                        <div class="row">




                           @foreach ($produk as $produks)
                           <div class="col-lg-3 col-md-6">
                              <div class="coffee_img" ><img src="{{asset('storage/Produk/'. $produks->image_produk)}}"></div>
                              <h3 class="types_text">{{$produks->nama_produk}}</h3>
                              <p class="looking_text">{{$produks->kategori_produk}} - {{$produks->harga_promo}}</p>
                              <div class="read_bt"></div>
                              <center><button class="btn btn-success" onclick="addValue('')">Pesan</button></center>
                           </div>
                           
                               
                           @endforeach
                
                     </div>
                  </div>
                  </div> --}}


                  {{-- <div class="carousel-item">
                     <div class="container-fluid">
                        <div class="row">
                 
                           @foreach ($produk as $produks)
                           <div class="col-lg-3 col-md-6">
                              <div class="coffee_img" ><img src="{{asset('storage/Produk/'. $produks->image_produk)}}"></div>
                              <h3 class="types_text">{{$produks->nama_produk}}</h3>
                              <p class="looking_text">{{$produks->kategori_produk}} - {{$produks->harga_promo}}</p>
                              <div class="read_bt"></div>
                              <center><button class="btn btn-success">Pesan</button></center>
                           </div>
                               
                           @endforeach


                     </div>
                  </div>

               </div> --}}

               <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
               <i class="fa fa-arrow-left"></i>
               </a>
               <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
               <i class="fa fa-arrow-right"></i>
               </a>
            </div>
         </div>
      </div>
      <!-- coffee section end -->



<br><br>




      <!-- contact section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding mt-5">
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





      <form method="POST" action="{{route('PesanMenu') }}">
         @csrf
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pemesanan</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
            
 


                  <label for="nama_pemesan">Nama Pemesan</label>
                  <input type="text" name="nama_konsumen" id="nama_konsumen" class="form-control">

                  <label for="nomor_hp_pemesanan">Nomor HP Pemesan</label>
                  <input type="text" name="nomor_hp_pemesanan" id="nomor_hp_pemesanan" class="form-control">

                  <input type="hidden" name="list_data_pesanan" id="hiddenInput">
                  <input type="hidden" name="total_harga" id="Total_Harga_Number">
                  <input type="hidden" name="status_pemesanan" value="1">
                  <label for="pembayaran">Metode Bayar</label> <br>
                  <select name="pembayaran" id="pembayaran" style="width:100%" class="form-control">

                     <option value="Cash">Cash</option>
                     <option value="Online">Online (TF, QRIS, dll)</option>
                  
                  </select>
                  <br> <br>

                 <table class="table" id="tabel_pesanan">
 
                     <thead>
                        <tr>
                        <th>Data Pesanan</th>
                        <th>Harga Pesanan</th>
                        <tr>
                     </thead>

                     <tbody id="nilai_pesanan">

                        <tr>
                        <td></td>
                        <td></td>
                        <tr>

                     </tbody>
                  <tr>
                     <th>Total Harga:</th>
                     <td id="totalHarga">Rp.</td>
                  </tr>

                  </table>



                 

 
             
            </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
               <button class="btn btn-primary" type="submit">Kirim Pesanan</button>
             </div>
           </div>
         </div>
       </div>

      </form>



      <script>
         // function addValue(value) {


         //    var hiddenInput = document.getElementById("hiddenInput");
         //    var currentValue = hiddenInput.value;

         //    if (currentValue) {
         //        hiddenInput.value = currentValue + ";" + value;
         //    } else {
         //        hiddenInput.value = value;
         //    }
         // }


var counts = {};

function addValue(value, textareaId, Hargavalue, buttonId) {
  var hiddenInput = document.getElementById('hiddenInput');
  var hiddenInputHarga = document.getElementById('hiddenInputHarga');
  var textarea = document.getElementById(textareaId);
  var button_id = document.getElementById(buttonId);


  // Initialize count if not exists
  if (!counts[value]) {
    counts[value] = 0;
  }

  // Update the count
  counts[value] += 1;

  // Update the hidden input value
  if (hiddenInput.value) {
    hiddenInput.value += ';' + value;
  } else {
    hiddenInput.value = value;
  }

  if (hiddenInputHarga.value) {
    hiddenInputHarga.value += ';' + Hargavalue;
  } else {
    hiddenInputHarga.value = Hargavalue;
  }


            if (counts[value]<=0 || counts[value] == '') {
               
               button_id.disabled = true;

            } 
            else {
               button_id.disabled = false;
            }





  // Update the corresponding textarea with the count
  textarea.value = counts[value];
  textarea.innerHTML = "Pemesanan : " + counts[value];
  console.log(textarea.value);








  var produk_values = hiddenInput.value.split(';');
  var harga_values = hiddenInputHarga.value.split(';');
  console.log(produk_values);

  var nilai_pesanan = document.getElementById('nilai_pesanan');

  nilai_pesanan.innerHTML='';



  var table = document.getElementById('tabel_pesanan').getElementsByTagName('tbody')[0];

  // Mengisi nilai td berdasarkan data array
  for (var i = 0; i < produk_values.length; i++) {
    var row = table.insertRow();  // Membuat baris baru

    var cellProduk = row.insertCell(0);  // Menambahkan sel untuk harga
    var cellHarga = row.insertCell(1);  // Menambahkan sel untuk nama produk

   //  var hargaFormatted = parseInt(hargaArray[i]).toLocaleString();

    cellProduk.innerHTML = produk_values[i];  // Mengisi sel harga
    cellHarga.innerHTML = 'Rp. ' + harga_values[i].toLocaleString();  // Mengisi sel nama produk
   // cellHarga.innerHTML =  hargaFormatted;  // Mengisi sel nama produk

  }

  var hargaArrayNumber = harga_values.map(function(harga) {
    return parseInt(harga.replace('.', '')); // Menghapus titik desimal dan mengonversi ke integer
  });

    // Menjumlahkan nilai dalam hargaArrayNumber
    var totalHarga = hargaArrayNumber.reduce(function(total, harga) {
    return total + harga;
  }, 0);

  document.getElementById('totalHarga').innerText = 'Total Harga: Rp. ' + totalHarga.toLocaleString();

  document.getElementById('Total_Harga_Number').value = totalHarga;




//   values.forEach(function(value, index) {
//        var tr = document.createElement('tr');
//         var td_1 = document.createElement('td');
//         td_1.id = "td_produk_" + index;
//         td_1.textContent = value;
//         tr.appendChild(td_1);
//         nilai_pesanan.appendChild(tr);
//       });



}




function removeValue(value, textareaId, Hargavalue, buttonId) {
            var hiddenInput = document.getElementById("hiddenInput");
            var currentValue = hiddenInput.value;

            var hiddenInputHarga = document.getElementById("hiddenInputHarga");
            var currentValueHarga = hiddenInputHarga.value;

            var textarea = document.getElementById(textareaId);

            var button_id = document.getElementById(buttonId);

              // Initialize count if not exists
            if (!counts[value]) {
               counts[value] = 0;
            }

            // Update the count
            counts[value] -= 1;


            if (currentValue) {
                var valuesArray = currentValue.split(";");
                var index = valuesArray.indexOf(value);
                if (index !== -1) {
                    valuesArray.splice(index, 1);
                    hiddenInput.value = valuesArray.join(";");
                }
            }


            if (currentValueHarga) {
                var valuesArrayHarga = currentValueHarga.split(";");
                var indexHarga = valuesArrayHarga.indexOf(Hargavalue);
                if (index !== -1) {
                    valuesArrayHarga.splice(indexHarga, 1);
                    hiddenInputHarga.value = valuesArrayHarga.join(";");
                }
            }


            if (counts[value]<=0 || counts[value] == '') {
               
               button_id.disabled = true;

            } 
            else {
               button_id.disabled = false;
            }

             // Update the corresponding textarea with the count
            textarea.value = counts[value];
            textarea.innerHTML = "Pemesanan : " + counts[value];
            console.log(textarea.value);

            














  var produk_values = hiddenInput.value.split(';');
  var harga_values = hiddenInputHarga.value.split(';');
  console.log(produk_values);

  var nilai_pesanan = document.getElementById('nilai_pesanan');

  nilai_pesanan.innerHTML='';



  var table = document.getElementById('tabel_pesanan').getElementsByTagName('tbody')[0];

  // Mengisi nilai td berdasarkan data array
  for (var i = 0; i < produk_values.length; i++) {
    var row = table.insertRow();  // Membuat baris baru

    var cellProduk = row.insertCell(0);  // Menambahkan sel untuk harga
    var cellHarga = row.insertCell(1);  // Menambahkan sel untuk nama produk

   //  var hargaFormatted = parseInt(hargaArray[i]).toLocaleString();

    cellProduk.innerHTML = produk_values[i];  // Mengisi sel harga
    cellHarga.innerHTML = 'Rp. ' + harga_values[i].toLocaleString();  // Mengisi sel nama produk
   // cellHarga.innerHTML =  hargaFormatted;  // Mengisi sel nama produk

  }

  var hargaArrayNumber = harga_values.map(function(harga) {
    return parseInt(harga.replace('.', '')); // Menghapus titik desimal dan mengonversi ke integer
  });

    // Menjumlahkan nilai dalam hargaArrayNumber
    var totalHarga = hargaArrayNumber.reduce(function(total, harga) {
    return total + harga;
  }, 0);

  document.getElementById('totalHarga').innerText = 'Total Harga: Rp. ' + totalHarga.toLocaleString();

  document.getElementById('Total_Harga_Number').value = totalHarga;





        }






      </script>



<script>
         function showKopi() {
         var elems1 = document.getElementsByClassName('NonKopi');
         for (var i=0;i<elems1.length;i+=1){
         elems1[i].style.display = 'none';
         }

         var elems2 = document.getElementsByClassName('Kopi');
         for (let j = 0; j < elems2.length; j++) {
            elems2[j].style.display = 'block';
         }
         console.log('Kopi');
        }

        
        function showNonKopi() {
         var elems1 = document.getElementsByClassName('Kopi');
         for (var i=0;i<elems1.length;i+=1){
         elems1[i].style.display = 'none';
         }

         var elems2 = document.getElementsByClassName('NonKopi');
         for (let j = 0; j < elems2.length; j++) {
            elems2[j].style.display = 'block';
         }
        }


        function showAllMenu() {
         var elems1 = document.getElementsByClassName('Menu');
         for (var i=0;i<elems1.length;i+=1){
         elems1[i].style.display = 'block';
         }

        }

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