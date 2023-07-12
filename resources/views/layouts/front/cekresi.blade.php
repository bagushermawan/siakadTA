
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }} width=device-width, initial-scale=1.0" /> --}}
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" href="assets/css/rootresi.css">
    <link rel="stylesheet" href="assets/css/cekresi.css">

    <title>Cek Resi</title>
  </head>
  <body>
    <nav class="navbar flex">
      <div class="logo"><a href="{{route('/')}}"><img src="assets/Logo.svg" alt="logo" /></a></div>
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
              {{-- <li>
                <label for="expedisi">Pilih expedisi</label>
                <select name="expedisi" id="expedisi">
                  <option value="1" hidden>Pilih expedisi</option>
                </select>
              </li> --}}
              <li>
                <label for="resi">Nomor Transaksi</label>
                <input type='text' id='search' name='search' placeholder='Enter userid 1-7'>
                <a  class="btn btn-more track"  value='Search' id='but_search'>
                <i class="fa-regular fa-magnifying-glass"style="font-family: Font Awesome 5 Free; font-weight: 900"></i>
                Cek Status
                </a>
                {{-- <input type='button' value='Search' id='but_search'> --}}
                <input class="btn btn-more track"type='button' value='Fetch all records' id='but_fetchall'>

                {{-- <input style="visibility: hidden;"type="text" id="resi" name="resi" maxlength="17" placeholder="Masukkan nomor status/id" pattern="[A-Za-z0-9]+" required/> --}}
              </li>
              {{-- <button  class="btn btn-more track" type="submit">
                <i class="fa-regular fa-magnifying-glass"style="font-family: Font Awesome 5 Free; font-weight: 900"></i>
                Cek Status
              </button> --}}
            </ul>
          </form>
        </div>
        <div class="detail-container">
          <h3 class="title-section"><span>Cek</span> Status</h3>
          <div class="body-card flex">
            <div id="summary" class="display-false"></div>
            <div class="flex info-card">
              {{-- <img src="assets/home-motor.png" alt="gambar" /> --}}
                <table border='1' id='empTable' style='border-collapse: collapse;'>
                <thead>
                <tr>
                    <th>S.no</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Platnomer</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
              <p>Silahkan isi form untuk lacak pengiriman</p>
            </div>
          </div>
        </div>
      </div>
      <div id="container-fill" class="display-false">
        <h3 class="title-section"><span>Lihat</span> Lokasi Paket</h3>
        <div class="progress-history"></div>
      </div>
    </section>
    <!-- <footer class="main-footer" id="footer">
      <div class="footer-top flex">
        <div class="content flex" id="content-footer">
          <div class="about">
            <h2>Tentang Kami</h2>
            <ul>
              <li>Hubungi kami</li>
              <li>Kebijakan privasi</li>
              <li>Kebijakan refund</li>
              <li>Disclaimer</li>
            </ul>
          </div>
          <div class="wordpress">
            <h2>Wordpress</h2>
            <ul>
              <li>Affiliate program</li>
              <li>Plugin and thames</li>
              <li>Docs</li>
              <li>Tutorial</li>
              <li>Licenses & support agreement</li>
            </ul>
          </div>
          <div class="apps">
            <h2>Get Apps</h2>
            <ul>
              <li>GetApps Store</li>
              <li>Play Store</li>
              <li>App Store</li>
              <li>Huawei AppGallery</li>
            </ul>
          </div>
        </div>
        <div class="footer-logo">
          <img src="aset/Logo.svg" alt="logo" />
          <p>
            mengalami kesulutan <br />
            Hubungi kami : <br />
            <a href="#">paketin_question@info.con</a>
          </p>
        </div>
        <div class="div-icon flex">
          <a href="#"><i class="fa-brands fa-youtube"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
      </div>
      <div class="footer-cc">
        <p>Copyrights © 2022 PaketIn by <a target="_blank" href="https://mulyasaputra.github.io">InSketch</a></p>
      </div>
    </footer> -->
    {{-- <script src="assets/js/mainresi.js"></script>
    <script src="assets/js/resi.js"></script> --}}
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

           }
         });
      });

      // Search by userid
      $('#but_search').click(function(){
         var transactionid = Number($('#search').val().trim());

         if(transactionid > 0){

           // AJAX POST request
           $.ajax({
              url: 'getTransactionbyid',
              type: 'post',
              data: {_token: CSRF_TOKEN, transactionid: transactionid},
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
             "<td align='center'>" + (i+1) + "</td>" +
             "<td align='center'>" + kode + "</td>" +
             "<td align='center'>" + nama + "</td>" +
             "<td align='center'>" + merek + "</td>" +
             "<td align='center'>" + platnomer + "</td>" +
             "<td align='center'>" + status + "</td>" +
           "</tr>";

           $("#empTable tbody").append(tr_str);
        }
      }else{
         var tr_str = "<tr>" +
           "<td align='center' colspan='4'>No record found.</td>" +
         "</tr>";

         $("#empTable tbody").append(tr_str);
      }
   }
   </script>
  </body>
</html>
