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
    <link rel="stylesheet" href="/assets/css/iziToast.min.css">

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

        .tumbler-wrapper {
            margin: auto;
            width: 50px;
            height: 30px;
            background-color: black;
            border: #1d92b2;
            border-radius: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 6px;
            cursor: pointer;
            display: flex;
            position: relative;
        }

        .tumbler-wrapper svg {
            width: 15px;
            height: 15px;
        }

        .tumbler {
            position: absolute;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background-color: #fff;
            transition: transform 0.5s, background-color 0.5s;
            will-change: transform;
        }

        .sun-svg,
        .moon-svg {
            display: none;
        }

        body.night-mode {
            background-color: #222;
            color: #d9d9d9;
        }

        body.night-mode .tumbler {
            transform: translateX(calc(100% - 2px));
        }

        .night-mode .herosection::before {
            background-color: #403e3e;
        }

        .night-mode .cekResi {
            background-color: #282626;
        }

        .night-mode .cekResi .container {
            border: none;
            background-color: #403e3e;
        }

        .night-mode .blog {
            border-radius: 12px;
            background-color: #282626;
        }

        .night-mode .blog .container .card {
            background-color: #403e3e;
        }

        .night-mode .blog .container .card .card-body {
            background-color: #403e3e;
        }

        .night-mode .pertanyaan {
            background-color: #282626;
        }

        .night-mode .pertanyaan .container .q-card {
            background-color: #403e3e;
        }

        .tumbler-wrapper .tooltiptext {
            display: flex;
            visibility: hidden;
            width: 120px;
            height: -webkit-fill-available;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            position: absolute;
            z-index: 1;
            top: -5px;
            left: 110%;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
        }

        .tumbler-wrapper:hover .tooltiptext {
            visibility: visible;
        }
        /* custom scrollbar */
::-webkit-scrollbar {
  width: 15px;
}

::-webkit-scrollbar-track {
  background-color: transparent;
}

::-webkit-scrollbar-thumb {
  background-color: #F5365C;
  border-radius: 20px;
  border: 2px solid transparent;
  background-clip: content-box;
}

::-webkit-scrollbar-thumb:hover {
  background-color: #bd0b2e;
}
::-webkit-scrollbar-thumb:active {
  background-color: #F5365C;
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
            <li><a href="/logout">@if (Auth::check())
                    <!-- Memeriksa apakah pengguna telah login atau belum -->
                   Hi, {{ Auth::user()->nama }}
                @else

                @endif</a></li>
            <li>
                <div class="tumbler-wrapper"><span class="tooltiptext">Dark/Light Theme</span>
                    <div class="tumbler"></div>
                    <?xml version="1.0" encoding="iso-8859-1"?>
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 499.712 499.712" style="enable-background:new 0 0 499.712 499.712;" xml:space="preserve">
                        <path style="fill:#FFD93B;" d="M146.88,375.528c126.272,0,228.624-102.368,228.624-228.64c0-55.952-20.16-107.136-53.52-146.88 C425.056,33.096,499.696,129.64,499.696,243.704c0,141.392-114.608,256-256,256c-114.064,0-210.608-74.64-243.696-177.712 C39.744,355.368,90.944,375.528,146.88,375.528z" /> <path style="fill:#F4C534;" d="M401.92,42.776c34.24,43.504,54.816,98.272,54.816,157.952c0,141.392-114.608,256-256,256 c-59.68,0-114.448-20.576-157.952-54.816c46.848,59.472,119.344,97.792,200.928,97.792c141.392,0,256-114.608,256-256 C499.712,162.12,461.392,89.64,401.92,42.776z" />
                        <g>
                            <polygon style="fill:#FFD83B;" points="128.128,99.944 154.496,153.4 213.472,161.96 170.8,203.56 180.864,262.296 128.128,234.568 75.376,262.296 85.44,203.56 42.768,161.96 101.744,153.4 	" /> <polygon style="fill:#FFD83B;" points="276.864,82.84 290.528,110.552 321.104,114.984 298.976,136.552 304.208,166.984 276.864,152.616 249.52,166.984 254.752,136.552 232.624,114.984 263.2,110.552 	" />
                        </g>
                    </svg>
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60"
                        style="enable-background:new 0 0 60 60;" xml:space="preserve">
                        <g>
                            <path style="fill:#F0C419;" d="M30,0c-0.552,0-1,0.448-1,1v6c0,0.552,0.448,1,1,1s1-0.448,1-1V1C31,0.448,30.552,0,30,0z" /> <path style="fill:#F0C419;" d="M30,52c-0.552,0-1,0.448-1,1v6c0,0.552,0.448,1,1,1s1-0.448,1-1v-6C31,52.448,30.552,52,30,52z" /> <path style="fill:#F0C419;" d="M59,29h-6c-0.552,0-1,0.448-1,1s0.448,1,1,1h6c0.552,0,1-0.448,1-1S59.552,29,59,29z" /> <path style="fill:#F0C419;" d="M8,30c0-0.552-0.448-1-1-1H1c-0.552,0-1,0.448-1,1s0.448,1,1,1h6C7.552,31,8,30.552,8,30z" /> <path style="fill:#F0C419;" d="M46.264,14.736c0.256,0,0.512-0.098,0.707-0.293l5.736-5.736c0.391-0.391,0.391-1.023,0-1.414 s-1.023-0.391-1.414,0l-5.736,5.736c-0.391,0.391-0.391,1.023,0,1.414C45.752,14.639,46.008,14.736,46.264,14.736z" /> <path style="fill:#F0C419;" d="M13.029,45.557l-5.736,5.736c-0.391,0.391-0.391,1.023,0,1.414C7.488,52.902,7.744,53,8,53 s0.512-0.098,0.707-0.293l5.736-5.736c0.391-0.391,0.391-1.023,0-1.414S13.42,45.166,13.029,45.557z" /> <path style="fill:#F0C419;" d="M46.971,45.557c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414l5.736,5.736 C51.488,52.902,51.744,53,52,53s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414L46.971,45.557z" /> <path style="fill:#F0C419;" d="M8.707,7.293c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414l5.736,5.736 c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414L8.707,7.293z" /> <path style="fill:#F0C419;" d="M50.251,21.404c0.162,0.381,0.532,0.61,0.921,0.61c0.13,0,0.263-0.026,0.39-0.08l2.762-1.172 c0.508-0.216,0.746-0.803,0.53-1.311s-0.804-0.746-1.311-0.53l-2.762,1.172C50.272,20.309,50.035,20.896,50.251,21.404z" /> <path style="fill:#F0C419;" d="M9.749,38.596c-0.216-0.508-0.803-0.746-1.311-0.53l-2.762,1.172 c-0.508,0.216-0.746,0.803-0.53,1.311c0.162,0.381,0.532,0.61,0.921,0.61c0.13,0,0.263-0.026,0.39-0.08l2.762-1.172 C9.728,39.691,9.965,39.104,9.749,38.596z" /> <path style="fill:#F0C419;" d="M54.481,38.813L51.7,37.688c-0.511-0.207-1.095,0.041-1.302,0.553 c-0.207,0.512,0.041,1.095,0.553,1.302l2.782,1.124c0.123,0.049,0.25,0.073,0.374,0.073c0.396,0,0.771-0.236,0.928-0.626 C55.241,39.603,54.994,39.02,54.481,38.813z" /> <path style="fill:#F0C419;" d="M5.519,21.188L8.3,22.312c0.123,0.049,0.25,0.073,0.374,0.073c0.396,0,0.771-0.236,0.928-0.626 c0.207-0.512-0.041-1.095-0.553-1.302l-2.782-1.124c-0.513-0.207-1.095,0.04-1.302,0.553C4.759,20.397,5.006,20.98,5.519,21.188z" /> <path style="fill:#F0C419;" d="M39.907,50.781c-0.216-0.508-0.803-0.745-1.311-0.53c-0.508,0.216-0.746,0.803-0.53,1.311 l1.172,2.762c0.162,0.381,0.532,0.61,0.921,0.61c0.13,0,0.263-0.026,0.39-0.08c0.508-0.216,0.746-0.803,0.53-1.311L39.907,50.781z" /> <path style="fill:#F0C419;" d="M21.014,9.829c0.13,0,0.263-0.026,0.39-0.08c0.508-0.216,0.746-0.803,0.53-1.311l-1.172-2.762 c-0.215-0.509-0.802-0.747-1.311-0.53c-0.508,0.216-0.746,0.803-0.53,1.311l1.172,2.762C20.254,9.6,20.625,9.829,21.014,9.829z" /> <path style="fill:#F0C419;" d="M21.759,50.398c-0.511-0.205-1.095,0.04-1.302,0.553l-1.124,2.782 c-0.207,0.512,0.041,1.095,0.553,1.302c0.123,0.049,0.25,0.073,0.374,0.073c0.396,0,0.771-0.236,0.928-0.626l1.124-2.782 C22.519,51.188,22.271,50.605,21.759,50.398z" /> <path style="fill:#F0C419;" d="M38.615,9.675c0.396,0,0.771-0.236,0.928-0.626l1.124-2.782c0.207-0.512-0.041-1.095-0.553-1.302 c-0.511-0.207-1.095,0.041-1.302,0.553L37.688,8.3c-0.207,0.512,0.041,1.095,0.553,1.302C38.364,9.651,38.491,9.675,38.615,9.675z" />
                        </g>
                        <circle style="fill:#F0C419;" cx="30" cy="30" r="20" />
                        <circle style="fill:#EDE21B;" cx="30" cy="30" r="15" />
                    </svg>

                </div>
            </li>
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
            {{-- @foreach ($blogs as $key => $b)
                <div class="card blog-item @if ($key >= 3) hidden-blog @endif">
                    @if (isset($b->gambar) && filter_var($b->gambar, FILTER_VALIDATE_URL))
                        <img src="{{ $b->gambar }}" alt="Gambar Blog" class="card-img-top">
                    @else
                        <img src="{{ Storage::url($b->gambar) }}" alt="Gambar Default" class="card-img-top">
                    @endif
                    <img src="https://dummyimage.com/16:9x540/" alt="gambar" class="card-img-top" />
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
            @endforeach --}}
        </div>
        <button class="btn btn-more" id="btn-more-blog">Lebih lanjut</button>
        <button class="btn btn-more" id="btn-no-more-blog"
            style="display: none;pointer-events: none;box-shadow: rgb(172, 181, 246) 0px 2px 6px;background-color: rgb(131 132 141);}">End
            of Blogs</button>
    </section>
    <section class="pertanyaan">
        <h3 class="title-section">Tanya Bengkelq</h3>
        <div class="container" id="ask-container">
            {{-- @foreach ($asks as $key => $a)
                <div class="q-card flex @if ($key >= 3) hidden-ask @endif">
                    <img src="/assets/pic.png" alt="pic" class="q-img" />
                    <div class="q-body">
                        <div class="q-title"><span>{{ $a->judul }}</span></div>
                        <p>{{ $a->isi }}</p>
                    </div>
                </div>
            @endforeach --}}
        </div>
        <button class="btn btn-more" id="btn-more-tanya">Lebih lanjut</button>
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
    {{-- <script>
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
    </script> --}}

    {{-- Tanya --}}
    {{-- <script>
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
    </script> --}}
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
    <script>
        // Fungsi untuk mengubah tema dan menyimpan preferensi tema pengguna di localStorage
        function toggleTheme() {
            document.body.classList.toggle('night-mode');
            const isNightMode = document.body.classList.contains('night-mode');
            localStorage.setItem('nightMode', isNightMode);
        }

        // Panggil fungsi toggleTheme saat tumbler diklik
        document.querySelector('.tumbler-wrapper').addEventListener('click', toggleTheme);

        // Memeriksa preferensi tema pengguna di localStorage saat halaman dimuat
        const isNightModeStored = localStorage.getItem('nightMode');
        if (isNightModeStored === 'true') {
            document.body.classList.add('night-mode');
        }
    </script>
    <script src="{{ asset('assets/js/iziToast.js') }}"></script>
    @include('layouts.izitoast')
</body>

</html>
