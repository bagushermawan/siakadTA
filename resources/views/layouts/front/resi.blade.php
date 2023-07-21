<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/styleresi.css">
    <link rel="stylesheet" href="assets/css/rootresi.css">


    <title>Bengkelq</title>
</head>

<body>
    <nav class="navbar flex">
        <div class="logo"><a href="{{ route('/') }}"><img src="assets/logo.png" alt="logo" /></a></div>
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
                adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum
                telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal
                mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf.
            </p>
            <p>
                Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada
                perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset
                yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop
                Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.
            </p>
            <button class="cta"><a href="{{ route('/resi') }}">Cek Status</a></button>
        </div>
        <img src="assets/home-drone.png" alt="" class="image" />
    </section>
    <section class="cekResi">
        <div class="container">
            <h3>Cek Status <span>Motormu</span></h3>
            <form action="#" method="#">
                <ul class="flex">
                    <li>
                        <input type="text" id="resi" name="resi" maxlength="17"
                            placeholder="Masukkan nomor kode/nama" pattern="[A-Za-z0-9]+" />
                    </li>
                </ul>
                <button type="submit" class="btn track">LACAK</button>
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
                    <h5 class="card-title">Lorem ipsum dolor sit amet consectetur, adipisicing elit Vel magni.</h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel magni numquam dolorum inventore
                        excepturi ex
                        necessitatibus quos nemo atque incidunt, ratione obcaecati accusantium aperiam dolore nesciunt
                        molestias
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
                    <h5 class="card-title">Lorem ipsum dolor sit amet consectetur, adipisicing elit Vel magni.</h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel magni numquam dolorum inventore
                        excepturi ex
                        necessitatibus quos nemo atque incidunt, ratione obcaecati accusantium aperiam dolore nesciunt
                        molestias
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
                    <h5 class="card-title">Lorem ipsum dolor sit amet consectetur, adipisicing elit Vel magni.</h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel magni numquam dolorum inventore
                        excepturi ex
                        necessitatibus quos nemo atque incidunt, ratione obcaecati accusantium aperiam dolore nesciunt
                        molestias
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
                    <h5 class="card-title">Lorem ipsum dolor sit amet consectetur, adipisicing elit Vel magni.</h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel magni numquam dolorum inventore
                        excepturi ex
                        necessitatibus quos nemo atque incidunt, ratione obcaecati accusantium aperiam dolore nesciunt
                        molestias
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
                    <h5 class="card-title">Lorem ipsum dolor sit amet consectetur, adipisicing elit Vel magni.</h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel magni numquam dolorum inventore
                        excepturi ex
                        necessitatibus quos nemo atque incidunt, ratione obcaecati accusantium aperiam dolore nesciunt
                        molestias
                        mollitia consectetur nihil ad architecto quia.....
                    </p>
                </div>
            </div>
        </div>
        <button class="btn btn-more">Lihat Lebih Lanjut</button>
    </section>
    <section class="pertanyaan">
        <h3 class="title-section">Tanya Bengkelq</h3>
        <div class="container">
            <div class="q-card flex">
                <img src="/assets/pic.png" alt="pic" class="q-img" />
                <div class="q-body">
                    <div class="q-title">Lorem Ipsum : <span>es simplemente</span></div>
                    <p>el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha</p>
                </div>
            </div>
            <div class="q-card flex">
                <img src="/assets/pic.png" alt="pic" class="q-img" />
                <div class="q-body">
                    <div class="q-title">Lorem Ipsum : <span>es simplemente</span></div>
                    <p>el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha</p>
                </div>
            </div>
            <div class="q-card flex">
                <img src="/assets/pic.png" alt="pic" class="q-img" />
                <div class="q-body">
                    <div class="q-title">Lorem Ipsum : <span>es simplemente</span></div>
                    <p>el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha</p>
                </div>
            </div>
            <div class="q-card flex">
                <img src="/assets/pic.png" alt="pic" class="q-img" />
                <div class="q-body">
                    <div class="q-title">Lorem Ipsum : <span>es simplemente</span></div>
                    <p>el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha</p>
                </div>
            </div>
        </div>
        <button class="btn btn-more">Lihat Lebih Lanjut</button>
    </section>
    <section class="tentang" id="tentang">
        <h3 class="title-section">Tentang Kami</h3>
        <div class="text-container">
            <p>
                <span>Tidak seperti</span> anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak.
                Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi,
                hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun.
            </p>
            <p>
                <span>Richard McClintock,</span> seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia,
                mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas,
                yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum.
            </p>
            <ul>
                <li>
                    <span>Ada banyak variasi tulisan Lorem Ipsum</span> yang tersedia, tapi kebanyakan sudah mengalami
                    perubahan bentuk,
                    entah karena unsur humor atau kalimat yang diacak hingga nampak sangat tidak masuk akal.
                </li>
                <li>
                    <span>Jika anda ingin menggunakan tulisan Lorem Ipsum,</span> anda harus yakin tidak ada bagian yang
                    memalukan yang tersembunyi di tengah naskah tersebut.
                    Semua generator Lorem Ipsum di internet cenderung untuk mengulang bagian-bagian tertentu.
                </li>
            </ul>
            <p>
                Karena itu inilah generator pertama yang sebenarnya di internet.
                Ia menggunakan kamus perbendaharaan yang terdiri dari 200 kata Latin,
                yang digabung dengan banyak contoh struktur kalimat untuk menghasilkan Lorem Ipsun yang nampak masuk
                akal.
            </p>
            <p>
                Karena itu Lorem Ipsun yang dihasilkan akan selalu bebas dari pengulangan,
                unsur humor yang sengaja dimasukkan, kata yang tidak sesuai dengan karakteristiknya dan lain sebagainya.
            </p>
        </div>
    </section>
    <section class="up">
        <p>
            Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el
            estándar de las desde el año.
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
                <img style="height:50px;" src="assets/logo.png" alt="logo" />
                <p>
                    mengalami kesulitan <br />
                    Hubungi kami : <br />
                    <a href="##">awikwok@wik.wok</a>
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
    {{-- Script Menu bar --}}
    <script>
        const mobileMenu = document.querySelector(".mobile-menu"),
            listMenu = document.querySelector(".list-menu");
        mobileMenu.addEventListener("click", () => {
            mobileMenu.classList.toggle("active");
            listMenu.classList.toggle("active");
        });
    </script>

    {{-- <script src="assets/js/mainresi.js"></script> --}}
    <div id="user-name" data-nama="{{ Auth::check() ? 'Hi, ' . Auth::user()->nama : 'Hwaloo guest!' }}"></div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mengambil elemen dengan id "user-name" dan mendapatkan nilai atribut data-nama
            var userNameElement = document.getElementById("user-name");
            var namauser = userNameElement.dataset.nama;

            // Mengecek apakah namauser adalah "Hwaloo guest!"
            if (namauser === 'Hwaloo guest!') {
                // Menampilkan namauser dengan warna merah
                console.log("Tidak ada user yang login, " + "%c" + namauser,
                    "font-weight: bold;color: red;font-size:30px;");
            } else {
                // Menampilkan namauser dengan warna gold
                console.log("User yang login: " + "%c" + namauser, "font-weight: bold;color: gold;font-size:30px;");
            }
        });
    </script>
</body>

</html>
