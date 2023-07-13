
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" href="assets/css/rootresi.css">
    <link rel="stylesheet" href="assets/css/cekresi.css">

    <title>Cek Status</title>
  </head>
  <body>
    <nav class="navbarr flex">
      <div class="logo"><a href="{{route('/')}}"><img src="assets/logo.png" alt="logo" /></a></div>
      <div class="mobile-menu"><span></span></div>
      <ul class="list-menu flex">
        <li><a href="#blog">Blog</a></li>
        <li><a href="#tentang">Tentang kami</a></li>
      </ul>
    </nav>
    <section id="main" class="flex">
      <h2>
        Cek Resi JNE, J&T, SiCepat, AnterAja, POS, TIKI,Wahana, Lion Parcel &
        Lainya
      </h2>
      <p>
        Kamu bisa lacak/cek resi paket pengirman barang kamu yang dikirim
        melalui kurir JNE, J&T, SiCepat, AnterAja, POS, TIKI, Wahana, Lion
        parcel dan masih banya lagi. disini. Hasil Cepat, Status Akurat &
        Terlengkap
      </p>
      <div id="container-resi" class="resi">
        <div class="form-container">
          <form action="" method="get">
            <ul>
              <li>
                <label class="teks" for="resi">Kode Transaksi</label>
                <input class="teks" type='text' id='search' name='search' placeholder='Masukkan kode transaksi ..'>
                <a  class="btn btn-more track"  value='Search' id='but_search'>
                <i class="fa-regular fa-magnifying-glass"style="font-family: Font Awesome 5 Free; font-weight: 900"></i>
                Cek Status
                </a>
                <input class="btn btn-more track"type='button' value='Fetch all records' id='but_fetchall'>
              </li>
            </ul>
          </form>
        </div>
        <div class="detail-container">
          <h3 class="title-section"><span>Cek</span> Status</h3>
          <div class="body-card flex">
            <div class="body-card">
              <img class="ptes" src="assets/home-motor.png" alt="gambar" />
              <p class="ptes">Silahkan isi form untuk lacak pengiriman</p>
                <table id='empTable' style='width:100%;margin:5px'>
                <thead>
                </thead>
                <tbody></tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
      <div id="container-fill" class="display-false">
        <h3 class="title-section"><span>Lihat</span> Lokasi Paket</h3>
        <div class="progress-history"></div>
      </div>
    </section>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script type='text/javascript'>
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $(document).ready(function(){

      // Fetch all records
      $('#but_fetchall').click(function(){

         // AJAX GET request
         $.ajax({
           url: 'getTransaction',
           type: 'get',
           dataType: 'json',
           success: function(response){

              createRows(response);
$('.body-card .ptes').hide();
           }
         });
      });

      // Search by userid
      $('#but_search').click(function(){
         var transactionKode = $('#search').val().trim();

   if (transactionKode !== '') {
$('.body-card .ptes').hide();
           // AJAX POST request
           $.ajax({
              url: 'getTransactionbyid',
              type: 'post',
              data: {_token: CSRF_TOKEN, transactionKode: transactionKode},
              dataType: 'json',
              success: function(response){

                 createRows(response);

              }
           });
         }

      });

   });

   // Create table rows
   function createRows(response){
      var len = 0;
      $('#empTable tbody').empty(); // Empty <tbody>
      if(response['data'] != null){
         len = response['data'].length;
      }

      if(len > 0){
        for(var i=0; i<len; i++){
           var id = response['data'][i].id;
           var kode = response['data'][i].kode;
           var nama = response['data'][i].nama;
           var merek = response['data'][i].merek;
           var platnomer = response['data'][i].platnomer;
           var status = response['data'][i].status;

           var tr_str = "<tr>" +
        "<th>No</th><th></th><td>" + (i + 1) + "</td>" + "</tr>" +
        "<tr><th>Kode</th><th>:</th><td>" + kode + "</td></tr>" +
        "<tr><th>Nama</th><th>:</th><td>" + nama + "</td></tr>" +
        "<tr><th>Merek</th><th>:</th><td>" + merek + "</td></tr>" +
        "<tr><th>Plat Nomor</th><th>:</th><td>" + platnomer + "</td></tr>" +
        "<tr><th>Status</th><th>:</th><td >" + status + "</td></tr>";

           $("#empTable tbody").append(tr_str);
        }
      }else{
         var tr_str = "<tr>" +
           "<td align='center' colspan='4'><b>No record found.</b></td>" +
         "</tr>";

         $("#empTable tbody").append(tr_str);
      }
   }
   </script>
  </body>
</html>
