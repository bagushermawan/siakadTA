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
    <style>
        .hidden-blog {
            display: none;
        }

        .btn-no-more {}

        .hidden-blog {
            display: none;
        }

        .btn-no-more {}

        .hidden-ask {
            display: none;
        }

        .btn-scroll-top {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            font-size: 16px;
            padding: 10px 15px;
            border: none;
            outline: none;
            background-color: #F5365C;
            color: white;
            cursor: pointer;
            border-radius: 4px;
            transition: opacity 0.3s ease;
        }

        .btn-scroll-top:hover {
            opacity: 0.8;
        }

        /* Gaya tombol scroll to top saat tampilan layar kurang dari 768px */
        @media screen and (max-width: 767px) {
            .btn-scroll-top {
                bottom: 10px;
                right: 10px;
                font-size: 14px;
            }
        }

        /* Tampilkan tombol scroll to top saat posisi scroll telah mencapai 25% dari tinggi halaman */
        @media screen and (min-height: 768px) {
            .btn-scroll-top {
                display: none;
            }

            .btn-scroll-top.active {
                display: block;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar flex">
        <div class="logo"><a href="{{ route('/') }}"><img src="assets/logo.png" alt="logo" /></a></div>
        <div class="mobile-menu"><span></span></div>
        <ul class="list-menu flex">
            @if ($currentUserRole === 'Admin')
                <li class="btn btn-primary"><a href="{{ route('home') }}">Admin Page</a></li>
            @endif
            <li><a href="#blog">Blog</a></li>
            <li><a href="#tentang">Tentang kami</a></li>
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
            <button class="cta"><a href="#cekstatus">Cek Status</a></button>
        </div>
        <img src="assets/home-drone.png" alt="" class="image" />
    </section>
    <section class="cekResi" id="cekstatus">
        <div class="container">
            <h3>Cek Status <span>Motormu</span></h3>
            <form id="cekResiForm" action="{{ route('resi') }}" method="get">

                <ul class="flex">
                    <li>
                        <input type="text" id="search" name="search" maxlength="17"
                            placeholder="Masukkan nomor kode/nama" pattern="[A-Za-z0-9]+" />
                    </li>
                </ul>
                <button type="submit" class="btn track">LACAK</button>
            </form>
        </div>
    </section>
    <section class="blog" id="blog">
        <h3 class="title-section">Blog Terbaru</h3>
        <div class="container" id="blog-container">
            @foreach ($blogs as $key => $b)
                <div class="card blog-item @if ($key >= 3) hidden-blog @endif">
                    @if (isset($b->gambar) && filter_var($b->gambar, FILTER_VALIDATE_URL))
                        <img src="{{ $b->gambar }}" alt="Gambar Blog" class="card-img-top"> {{-- style="width:400px;height:300px;object-fit:cover;" --}}
                    @else
                        <img src="{{ Storage::url($b->gambar) }}" alt="Gambar Default" class="card-img-top">
                    @endif
                    {{-- <img src="https://dummyimage.com/16:9x540/" alt="gambar" class="card-img-top" /> --}}
                    <div class="card-body">
                        <div class="card-info flex">
                            <div class="autor"><i class="fa-solid fa-user"></i>{{ $b->nama_user }}</div>
                            <div class="date"><i
                                    class="fa-solid fa-calendar-days"></i>{{ $b->tanggal_post->format('j F Y, h:i A') }}
                            </div>
                        </div>
                        <h5 class="card-title">{{ $b->judul }}</h5>
                        <p class="card-text">
                            {{ $b->isi }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="btn btn-more" id="btn-more-blog">Load more</button>
        <button class="btn btn-more" id="btn-no-more-blog"
            style="display: none;pointer-events: none;box-shadow: rgb(172, 181, 246) 0px 2px 6px;background-color: rgb(131 132 141);}">End
            of Blogs</button>
    </section>
    <section class="pertanyaan">
        <h3 class="title-section">Tanya Bengkelq</h3>
        <div class="container" id="ask-container">
            @foreach ($asks as $key => $a)
                <div class="q-card flex @if ($key >= 3) hidden-ask @endif">
                    <img src="/assets/pic.png" alt="pic" class="q-img" />
                    <div class="q-body">
                        <div class="q-title"><span>{{ $a->judul }}</span></div>
                        <p>{{ $a->isi }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="btn btn-more" id="btn-more-tanya">Lihat Lebih Lanjut</button>
        <button class="btn btn-more" id="btn-no-more-tanya"
            style="display: none;pointer-events: none;box-shadow: rgb(172, 181, 246) 0px 2px 6px;background-color: rgb(131 132 141);}">End
            of Questions</button>
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
            <div class="footer-logo">
                <img style="height:50px;" src="assets/logo.png" alt="logo" />
                <p>
                    mengalami kesulitan <br />
                    Hubungi kami : <br />
                    <a href="##">awikwok@wik.wok</a>
                </p>
            </div>
        </div>
        <div class="footer-cc">
            <p>Copyrights © 2022 PaketIn by <a target="_blank" href="https://mulyasaputra.github.io">InSketch</a></p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.easing@1.4.1/jquery.easing.min.js"></script>
    {{-- Script Menu bar --}}
    <script>
        const mobileMenu = document.querySelector(".mobile-menu"),
            listMenu = document.querySelector(".list-menu");
        mobileMenu.addEventListener("click", () => {
            mobileMenu.classList.toggle("active");
            listMenu.classList.toggle("active");
        });
    </script>
    @if ($currentUserRole !== 'guest')
        <script>
            var currentUserRole = @json($currentUserRole);
            console.log("Role yang login: ", currentUserRole);
        </script>
    @endif
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
    <script>
        $(document).ready(function() {
            const batchSizeBlog = 3;
            let currentBatchBlog = 1;
            const totalBatchesBlog = Math.ceil({{ $blogs->count() }} / batchSizeBlog);

            // Sembunyikan button "End of Blogs" jika sudah mencapai total batch
            if (currentBatchBlog >= totalBatchesBlog) {
                $("#btn-no-more-blog").show();
            }

            // Fungsi untuk menampilkan batch blog
            function showBatchBlog(startIndex, endIndex) {
                $(".blog-item").slice(startIndex, endIndex).fadeIn({
                    duration: 1500,
                    easing: "easeOutQuad"
                });
            }

            // Tampilkan batch pertama blog saat halaman dimuat
            showBatchBlog(0, batchSizeBlog);

            // Event listener untuk button "Load More" blog
            $("#btn-more-blog").on("click", function() {
                // Hitung indeks awal dan akhir untuk batch blog selanjutnya
                const startIndex = currentBatchBlog * batchSizeBlog;
                const endIndex = startIndex + batchSizeBlog;

                // Tampilkan batch blog selanjutnya
                showBatchBlog(startIndex, endIndex);

                // Sematikan tombol "Load More" blog jika sudah mencapai total batch
                currentBatchBlog++;
                if (currentBatchBlog >= totalBatchesBlog) {
                    $("#btn-more-blog").hide();
                    $("#btn-no-more-blog").show();
                }
            });
        });
    </script>

    {{-- Tanya --}}
    <script>
        $(document).ready(function() {
            const batchSizeTanya = 3;
            let currentBatchTanya = 1;
            const totalBatchesTanya = Math.ceil({{ $asks->count() }} / batchSizeTanya);

            // Sembunyikan button "End of Tanya" jika sudah mencapai total batch
            if (currentBatchTanya >= totalBatchesTanya) {
                $("#btn-no-more-tanya").show();
            }

            // Fungsi untuk menampilkan batch pertanyaan
            function showBatchTanya(startIndex, endIndex) {
                $(".q-card").slice(startIndex, endIndex).fadeIn({
                    duration: 1500,
                    easing: "easeOutQuad"
                });
            }

            // Tampilkan batch pertama pertanyaan saat halaman dimuat
            showBatchTanya(0, batchSizeTanya);

            // Event listener untuk button "Load More" pertanyaan
            $("#btn-more-tanya").on("click", function() {
                // Hitung indeks awal dan akhir untuk batch pertanyaan selanjutnya
                const startIndex = currentBatchTanya * batchSizeTanya;
                const endIndex = startIndex + batchSizeTanya;

                // Tampilkan batch pertanyaan selanjutnya
                showBatchTanya(startIndex, endIndex);

                // Sematikan tombol "Load More" pertanyaan jika sudah mencapai total batch
                currentBatchTanya++;
                if (currentBatchTanya >= totalBatchesTanya) {
                    $("#btn-more-tanya").hide();
                    $("#btn-no-more-tanya").show();
                }
            });
        });
    </script>
    {{-- Scroll Blog/Tanya --}}
    <script>
        $(document).ready(function() {
            // Fungsi untuk menambahkan efek scroll saat tombol di klik
            function addSmoothScrollToButton(buttonId, targetElementClass) {
                $(buttonId).on("click", function() {
                    // Ambil element blog atau pertanyaan terakhir yang ditampilkan
                    const $visibleElements = $(targetElementClass + ":visible");

                    // Cek apakah ada element yang ditampilkan sebelum melakukan scroll
                    if ($visibleElements.length > 0) {
                        const lastElementIndex = $visibleElements.length - 1;
                        const $lastElement = $visibleElements.eq(lastElementIndex);

                        $("html, body").animate({
                                scrollTop: $lastElement.offset().top - 100
                            },
                            250, // Waktu animasi dalam milidetik (misalnya, 1000ms = 1 detik)
                            "easeInOutBack" // Efek easing yang digunakan (ganti dengan efek yang diinginkan)
                        );
                    }

                    // Sematikan tombol "Load more" jika sudah mencapai akhir konten
                    if ($(targetElementClass + ":hidden").length === 0) {
                        $(buttonId).hide();
                        if (buttonId === "#btn-more-blog") {
                            $("#btn-no-more-blog").show();
                        } else {
                            $("#btn-no-more-tanya").show();
                        }
                    }
                });
            }

            // Panggil fungsi untuk tombol Blog
            addSmoothScrollToButton("#btn-more-blog", ".blog-item");

            // Panggil fungsi untuk tombol Tanya
            addSmoothScrollToButton("#btn-more-tanya", ".q-card");
        });
    </script>
    <button class="btn-scroll-top" onclick="scrollToTop()">&#8679; Scroll to Top</button>
    <script>
        function scrollToTop() {
            $("html, body").animate({
                scrollTop: 0
            }, 500, "easeInOutBack");
        }

        $(document).ready(function() {
            // Cek posisi scroll saat halaman dimuat
            if ($(window).scrollTop() > $(window).height() / 4) {
                $(".btn-scroll-top").addClass("active");
            }

            // Tampilkan/menyembunyikan tombol saat posisi scroll berubah
            $(window).scroll(function() {
                if ($(this).scrollTop() > $(this).height() / 4) {
                    $(".btn-scroll-top").addClass("active");
                } else {
                    $(".btn-scroll-top").removeClass("active");
                }
            });
        });
    </script>
</body>

</html>
