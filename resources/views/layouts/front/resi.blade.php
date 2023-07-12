<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" href="assets/css/styleresi.css">
    <link rel="stylesheet" href="assets/css/rootresi.css">


    <title>Bengkelq</title>
  </head>
  <body>
    <nav class="navbar flex">
      <div class="logo"><a href="{{route('/')}}"><img src="assets/Logo.svg" alt="logo" /></a></div>
      <div class="mobile-menu"><span></span></div>
      <ul class="list-menu flex">
        <li><a href="#blog">Blog</a></li>
        <li><a href="#tentang">Tentang kami</a></li>
        {{-- <li class="dropdown">
          Pusat bantuan
          <div class="dropdown-content">
            <a href="#" class="link">Solusi Bisnis</a>
            <a href="#" class="link">Tanya Paket</a>
            <a href="#" class="link">Kontak Kami</a>
          </div>
        </li> --}}
        {{-- <li><a href="#footer">Download</a></li> --}}
        {{-- <li class="flex">
          <button class="id">ID</button>
          <span></span>
          <button class="en">EN</button>
        </li> --}}
      </ul>
    </nav>
    <section class="herosection">
      <div>
        <h2>Bengkelq.com</h2>
        <p>
          Layanan kami memudahkan pengirim dan penerima paket untuk mengetahui status resi atau keberadaan paket yang
          sedang dikirim. Setiap hari ratusan ribu nomor resi dari berbagai kurir pengiriman dilacak melalui website,
          widget, dan aplikasi mobile.
        </p>
        <p>
          Apapun ekspedisi yang kamu gunakan, kamu bisa tracking resi jasa pengiriman barang di satu tempat saja.
          Mengenali otomatis (auto detect) resi dari 60 ekspedisi pengiriman.
        </p>
        <button class="cta"><a href="{{route('/resi')}}">Cek Status</a></button>
      </div>
      <img src="assets/home-drone.png" alt="" class="image" />
    </section>
    <section class="cekResi">
      <div class="container">
        <h3>Cek Status <span>Motormu</span></h3>
        <form action="resi.html" method="get">
          <ul class="flex">
            <li>
              <input
                type="text"
                id="resi"
                name="resi"
                maxlength="17"
                placeholder="Masukkan nomor status/id"
                pattern="[A-Za-z0-9]+"
              />
            </li>
            {{-- <li>
              <select name="expedisi" id="expedisi"></select>
            </li> --}}
          </ul>
          <button type="submit" class="btn track" disabled>LACAK</button>
        </form>
      </div>
    </section>
    <section class="blog" id="blog">
      <h3 class="title-section">Blog Terbaru</h3>
      <div class="container">
        <div class="card">
          <img src="https://dummyimage.com/16:9x540/" alt="gambar" class="card-img-top" />
          <div class="card-body">
            <div class="card-info flex">
              <div class="autor"><i class="fa-solid fa-user"></i>Admin</div>
              <div class="date"><i class="fa-solid fa-calendar-days"></i>2022 Desember 3</div>
            </div>
            <h5 class="card-title">Cara megetahui nomor resi kurus shopee expres mudah & praktis</h5>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel magni numquam dolorum inventore excepturi ex
              necessitatibus quos nemo atque incidunt, ratione obcaecati accusantium aperiam dolore nesciunt molestias
              mollitia consectetur nihil ad architecto quia.....
            </p>
          </div>
        </div>
        <div class="card">
          <img src="https://dummyimage.com/16:9x540/" alt="gambar" class="card-img-top" />
          <div class="card-body">
            <div class="card-info flex">
              <div class="autor"><i class="fa-solid fa-user"></i>Admin</div>
              <div class="date"><i class="fa-solid fa-calendar-days"></i>2022 Desember 3</div>
            </div>
            <h5 class="card-title">Cara megetahui nomor resi kurus shopee expres mudah & praktis</h5>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel magni numquam dolorum inventore excepturi ex
              necessitatibus quos nemo atque incidunt, ratione obcaecati accusantium aperiam dolore nesciunt molestias
              mollitia consectetur nihil ad architecto quia.....
            </p>
          </div>
        </div>
        <div class="card">
          <img src="https://dummyimage.com/16:9x540/" alt="gambar" class="card-img-top" />
          <div class="card-body">
            <div class="card-info flex">
              <div class="autor"><i class="fa-solid fa-user"></i>Admin</div>
              <div class="date"><i class="fa-solid fa-calendar-days"></i>2022 Desember 3</div>
            </div>
            <h5 class="card-title">Cara megetahui nomor resi kurus shopee expres mudah & praktis</h5>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel magni numquam dolorum inventore excepturi ex
              necessitatibus quos nemo atque incidunt, ratione obcaecati accusantium aperiam dolore nesciunt molestias
              mollitia consectetur nihil ad architecto quia.....
            </p>
          </div>
        </div>
        <div class="card">
          <img src="https://dummyimage.com/16:9x540/" alt="gambar" class="card-img-top" />
          <div class="card-body">
            <div class="card-info flex">
              <div class="autor"><i class="fa-solid fa-user"></i>Admin</div>
              <div class="date"><i class="fa-solid fa-calendar-days"></i>2022 Desember 3</div>
            </div>
            <h5 class="card-title">Cara megetahui nomor resi kurus shopee expres mudah & praktis</h5>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel magni numquam dolorum inventore excepturi ex
              necessitatibus quos nemo atque incidunt, ratione obcaecati accusantium aperiam dolore nesciunt molestias
              mollitia consectetur nihil ad architecto quia.....
            </p>
          </div>
        </div>
        <div class="card">
          <img src="https://dummyimage.com/16:9x540/" alt="gambar" class="card-img-top" />
          <div class="card-body">
            <div class="card-info flex">
              <div class="autor"><i class="fa-solid fa-user"></i>Admin</div>
              <div class="date"><i class="fa-solid fa-calendar-days"></i>2022 Desember 3</div>
            </div>
            <h5 class="card-title">Cara megetahui nomor resi kurus shopee expres mudah & praktis</h5>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel magni numquam dolorum inventore excepturi ex
              necessitatibus quos nemo atque incidunt, ratione obcaecati accusantium aperiam dolore nesciunt molestias
              mollitia consectetur nihil ad architecto quia.....
            </p>
          </div>
        </div>
      </div>
      <button class="btn btn-more">Lihat Lebih Lanjut</button>
    </section>
    <section class="pertanyaan">
      <h3 class="title-section">Tanya Paket</h3>
      <div class="container">
        <div class="q-card flex">
          <img src="/assets/pic.png" alt="pic" class="q-img" />
          <div class="q-body">
            <div class="q-title">Expedisi : <span>Lion Parcel</span></div>
            <p>Kenapa paket saya tidak bergerak, sejak 1 minggu yang lalu</p>
          </div>
        </div>
        <div class="q-card flex">
          <img src="/assets/pic.png" alt="pic" class="q-img" />
          <div class="q-body">
            <div class="q-title">Expedisi : <span>Lion Parcel</span></div>
            <p>Kenapa paket saya tidak bergerak, sejak 1 minggu yang lalu</p>
          </div>
        </div>
        <div class="q-card flex">
          <img src="/assets/pic.png" alt="pic" class="q-img" />
          <div class="q-body">
            <div class="q-title">Expedisi : <span>Lion Parcel</span></div>
            <p>Kenapa paket saya tidak bergerak, sejak 1 minggu yang lalu</p>
          </div>
        </div>
        <div class="q-card flex">
          <img src="/assets/pic.png" alt="pic" class="q-img" />
          <div class="q-body">
            <div class="q-title">Expedisi : <span>Lion Parcel</span></div>
            <p>Kenapa paket saya tidak bergerak, sejak 1 minggu yang lalu</p>
          </div>
        </div>
      </div>
      <button class="btn btn-more">Lihat Lebih Lanjut</button>
    </section>
    <section class="tentang" id="tentang">
      <h3 class="title-section">Tentang Kami</h3>
      <div class="text-container">
        <p>
          <span>Layanan kami</span> memudahkan pengirim dan penerima paket untuk mengetahui status resi atau keberadaan
          paket yang sedang dikirim. Setiap hari ratusan ribu nomor resi dari berbagai kurir pengiriman dilacak melalui
          website, widget, dan aplikasi mobile.
        </p>
        <p>
          <span>Situs Tracking/Lacak/Cek Resi Terbaik & Akurat di Indonesia.</span> Kami memberikan suatu kemudahan
          untuk pengirim dan penerima paket barang untuk melacak status/posisi paket barang kiriman anda. Setiap hari
          jutaan resi yang tersebar dari berbagai kurir pengiriman yang dicek melalui website dan aplikasi android. Data
          ongkos kirim diambil langsung dari web masing-masing kurir untuk menjaga akurasi data. Namun, jika Anda
          menemukan data yang tidak valid, silahkan laporkan ke tim kami.
        </p>
        <ul>
          <li>
            <span>Situs Lacak Pengiriman Paket Termudah dan Cepat.</span> Keunggulan yang ditawarkan
            pluginongkoskirim.com/cek-resi yaitu memberikan status pelacakan resi yang cepat. Cukup inputkan nomor resi
            anda, lalu pilih kurir yang tertera maka anda bisa langsung mengetahui dimana posisi paket anda . Kami juga
            bisa melacak setiap resi yang keluar dari marketplace atau toko online seperti Lazada, Tokopedia, Shopee,
            Dan semua toko online di Indonesia.
          </li>
          <li>
            <span>Support Banyak Kurir Ekspedisi.</span> Kami menyediakan layanan cek resi pengiriman barang dari situs
            kami yaitu ada 8 kurir ekspedisi terpercaya dan terbaik yang paling sering digunakan. Kami akan menambah
            terus ekspedisi-ekspedisi ke depannya.
          </li>
        </ul>
        <p>
          Segala data informasi mengenai status pengiriman paket barang anda adalah akurat diambil dari web
          masing-masing ekspedisi. Jadi jangan khawatir jika anda masih ragu-ragu, kami sampaikan bahwa data yang kam
          berikan adalah akurat dan terpercaya sesuai dengan sumber resmi asli dari ekspedisi langsung.
        </p>
        <p>
          Jika data yang kami berikan terdapat error atau tidak muncul status lacak pengiriman, maka cek juga dari web
          resmi nya, biasanya terdapat error atau maintenance dari web resmi masing-masing ekspedisi.
        </p>
      </div>
    </section>
    <section class="up">
      <p>
        Plugin Ongkos Kirim hanya mengumpulkan data dari berbagai jasa ekspedisi, tanpa merubah sedikitpun dan tanpa
        merubah apapun. Kami tidak bertanggung jawab atas ketidaksesuaian harga antara di web dan dari pihak ekspedisi
        yang bersangkutan.
      </p>
    </section>
    <footer class="main-footer" id="footer">
      <div class="footer-top flex">
        {{-- <div class="content flex" id="content-footer">
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
        </div> --}}
        <div class="footer-logo">
          <img src="assets/Logo.svg" alt="logo" />
          <p>
            mengalami kesulitan <br />
            Hubungi kami : <br />
            <a href="#">awikwok@wik.wok</a>
          </p>
        </div>
        {{-- <div class="div-icon flex">
          <a href="#"><i class="fa-brands fa-youtube"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
        </div> --}}
      </div>
      <div class="footer-cc">
        <p>Copyrights © 2022 PaketIn by <a target="_blank" href="https://mulyasaputra.github.io">InSketch</a></p>
      </div>
    </footer>

    {{-- <script src="assets/js/mainresi.js"></script> --}}
  </body>
</html>
