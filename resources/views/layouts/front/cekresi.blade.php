<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/rootresi.css">
    <link rel="stylesheet" href="assets/css/cekresi.css">
    <link rel="stylesheet" href="/assets/css/iziToast.min.css">
    <style>
        #search-error-toast {
            position: relative;
            top: 0;
            right: 0;
            z-index: 9999;
            /* Atur z-index lebih tinggi dari kotak pencarian */
        }

        .tumbler-wrapper {
            margin-left: auto;
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
            background-color: #121212;
            color: #d9d9d9;
        }

        body.night-mode .tumbler {
            transform: translateX(calc(100% - 2px));
        }

        .night-mode .form-container {
            color: #f6f6f6;
            background-color: #3c3c3c;
        }

        .night-mode #main .detail-container {
            color: #f6f6f6;
            background-color: #484848;
        }

        .night-mode #container-fill {
            color: #f6f6f6;
            background-color: #484848;
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
    </style>

    <title>Cek Status</title>
</head>

<body>
    <nav class="navbarr flex">
        <div class="logo"><a href="{{ route('/') }}"><img src="assets/logo.png" alt="logo" /></a></div>
        <div class="mobile-menu"><span></span></div>
        <ul class="list-menu flex">
            @if ($currentUserRole === 'Admin')
                <li class="btn btn-primary"><a href="{{ route('home') }}">Admin Page</a></li>
            @endif
            <li><a href="{{ route('/') }}#blog" target="_blank">Blog</a></li>
            <li><a href="{{ route('/') }}#tentang" target="_blank">Tentang kami</a></li>
            <li>
                <div class="tumbler-wrapper"><span class="tooltiptext">Dark/Light Theme</span>
                    <div class="tumbler"></div>
                    <?xml version="1.0" encoding="iso-8859-1"?>
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 499.712 499.712" style="enable-background:new 0 0 499.712 499.712;"
                        xml:space="preserve">
                        <path style="fill:#FFD93B;"
                            d="M146.88,375.528c126.272,0,228.624-102.368,228.624-228.64c0-55.952-20.16-107.136-53.52-146.88
	C425.056,33.096,499.696,129.64,499.696,243.704c0,141.392-114.608,256-256,256c-114.064,0-210.608-74.64-243.696-177.712
	C39.744,355.368,90.944,375.528,146.88,375.528z" />
                        <path style="fill:#F4C534;"
                            d="M401.92,42.776c34.24,43.504,54.816,98.272,54.816,157.952c0,141.392-114.608,256-256,256
	c-59.68,0-114.448-20.576-157.952-54.816c46.848,59.472,119.344,97.792,200.928,97.792c141.392,0,256-114.608,256-256
	C499.712,162.12,461.392,89.64,401.92,42.776z" />
                        <g>
                            <polygon style="fill:#FFD83B;"
                                points="128.128,99.944 154.496,153.4 213.472,161.96 170.8,203.56 180.864,262.296
		128.128,234.568 75.376,262.296 85.44,203.56 42.768,161.96 101.744,153.4 	" />
                            <polygon style="fill:#FFD83B;"
                                points="276.864,82.84 290.528,110.552 321.104,114.984 298.976,136.552 304.208,166.984
		276.864,152.616 249.52,166.984 254.752,136.552 232.624,114.984 263.2,110.552 	" />
                    </svg>
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60"
                        style="enable-background:new 0 0 60 60;" xml:space="preserve">
                        <g>
                            <path style="fill:#F0C419;"
                                d="M30,0c-0.552,0-1,0.448-1,1v6c0,0.552,0.448,1,1,1s1-0.448,1-1V1C31,0.448,30.552,0,30,0z" />
                            <path style="fill:#F0C419;"
                                d="M30,52c-0.552,0-1,0.448-1,1v6c0,0.552,0.448,1,1,1s1-0.448,1-1v-6C31,52.448,30.552,52,30,52z" />
                            <path style="fill:#F0C419;"
                                d="M59,29h-6c-0.552,0-1,0.448-1,1s0.448,1,1,1h6c0.552,0,1-0.448,1-1S59.552,29,59,29z" />
                            <path style="fill:#F0C419;"
                                d="M8,30c0-0.552-0.448-1-1-1H1c-0.552,0-1,0.448-1,1s0.448,1,1,1h6C7.552,31,8,30.552,8,30z" />
                            <path style="fill:#F0C419;"
                                d="M46.264,14.736c0.256,0,0.512-0.098,0.707-0.293l5.736-5.736c0.391-0.391,0.391-1.023,0-1.414
		s-1.023-0.391-1.414,0l-5.736,5.736c-0.391,0.391-0.391,1.023,0,1.414C45.752,14.639,46.008,14.736,46.264,14.736z" />
                            <path style="fill:#F0C419;"
                                d="M13.029,45.557l-5.736,5.736c-0.391,0.391-0.391,1.023,0,1.414C7.488,52.902,7.744,53,8,53
		s0.512-0.098,0.707-0.293l5.736-5.736c0.391-0.391,0.391-1.023,0-1.414S13.42,45.166,13.029,45.557z" />
                            <path style="fill:#F0C419;"
                                d="M46.971,45.557c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414l5.736,5.736
		C51.488,52.902,51.744,53,52,53s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414L46.971,45.557z" />
                            <path style="fill:#F0C419;"
                                d="M8.707,7.293c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414l5.736,5.736
		c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414L8.707,7.293z" />
                            <path style="fill:#F0C419;"
                                d="M50.251,21.404c0.162,0.381,0.532,0.61,0.921,0.61c0.13,0,0.263-0.026,0.39-0.08l2.762-1.172
		c0.508-0.216,0.746-0.803,0.53-1.311s-0.804-0.746-1.311-0.53l-2.762,1.172C50.272,20.309,50.035,20.896,50.251,21.404z" />
                            <path style="fill:#F0C419;"
                                d="M9.749,38.596c-0.216-0.508-0.803-0.746-1.311-0.53l-2.762,1.172
		c-0.508,0.216-0.746,0.803-0.53,1.311c0.162,0.381,0.532,0.61,0.921,0.61c0.13,0,0.263-0.026,0.39-0.08l2.762-1.172
		C9.728,39.691,9.965,39.104,9.749,38.596z" />
                            <path style="fill:#F0C419;"
                                d="M54.481,38.813L51.7,37.688c-0.511-0.207-1.095,0.041-1.302,0.553
		c-0.207,0.512,0.041,1.095,0.553,1.302l2.782,1.124c0.123,0.049,0.25,0.073,0.374,0.073c0.396,0,0.771-0.236,0.928-0.626
		C55.241,39.603,54.994,39.02,54.481,38.813z" />
                            <path style="fill:#F0C419;"
                                d="M5.519,21.188L8.3,22.312c0.123,0.049,0.25,0.073,0.374,0.073c0.396,0,0.771-0.236,0.928-0.626
		c0.207-0.512-0.041-1.095-0.553-1.302l-2.782-1.124c-0.513-0.207-1.095,0.04-1.302,0.553C4.759,20.397,5.006,20.98,5.519,21.188z" />
                            <path style="fill:#F0C419;"
                                d="M39.907,50.781c-0.216-0.508-0.803-0.745-1.311-0.53c-0.508,0.216-0.746,0.803-0.53,1.311
		l1.172,2.762c0.162,0.381,0.532,0.61,0.921,0.61c0.13,0,0.263-0.026,0.39-0.08c0.508-0.216,0.746-0.803,0.53-1.311L39.907,50.781z" />
                            <path style="fill:#F0C419;"
                                d="M21.014,9.829c0.13,0,0.263-0.026,0.39-0.08c0.508-0.216,0.746-0.803,0.53-1.311l-1.172-2.762
		c-0.215-0.509-0.802-0.747-1.311-0.53c-0.508,0.216-0.746,0.803-0.53,1.311l1.172,2.762C20.254,9.6,20.625,9.829,21.014,9.829z" />
                            <path style="fill:#F0C419;"
                                d="M21.759,50.398c-0.511-0.205-1.095,0.04-1.302,0.553l-1.124,2.782
		c-0.207,0.512,0.041,1.095,0.553,1.302c0.123,0.049,0.25,0.073,0.374,0.073c0.396,0,0.771-0.236,0.928-0.626l1.124-2.782
		C22.519,51.188,22.271,50.605,21.759,50.398z" />
                            <path style="fill:#F0C419;"
                                d="M38.615,9.675c0.396,0,0.771-0.236,0.928-0.626l1.124-2.782c0.207-0.512-0.041-1.095-0.553-1.302
		c-0.511-0.207-1.095,0.041-1.302,0.553L37.688,8.3c-0.207,0.512,0.041,1.095,0.553,1.302C38.364,9.651,38.491,9.675,38.615,9.675z" />
                        </g>
                        <circle style="fill:#F0C419;" cx="30" cy="30" r="20" />
                        <circle style="fill:#EDE21B;" cx="30" cy="30" r="15" />
                    </svg>

                </div>
            </li>
        </ul>
    </nav>
    <section id="main" class="flex">
        <h2>
            Cek Status Motormu disini
        </h2>
        <p>
            Kamu bisa mengecek status motormu disini, mulai dari Nama, Merk, Nopol, Status, dan detail lainnya.
        </p>
        <div id="container-resi" class="resi">
            <div class="form-container">
                <form action="" method="get">
                    <ul>
                        <li>
                            <label class="teks">Kode Transaksi :</label>
                            <div id="search-error-toast"></div>
                            <input class="teks" type='text' id='search' name='search'
                                placeholder='Masukkan kode/nama transaksi ..' required autofocus>
                            <a type="button" class="btn btn-more track" value='Search' id='but_search'>
                                <i
                                    class="fa-regular fa-magnifying-glass"style="font-family: Font Awesome 5 Free; font-weight: 900"></i>
                                Cek Status
                            </a>
                            @if ($currentUserRole === 'Admin')
                                <input class="btn btn-more track" type='button' value='Fetch all records'
                                    id='but_fetchall'>
                            @endif
                        </li>
                    </ul>
                </form>
            </div>
            <div class="detail-container">
                <h3 class="title-section"><span>Cek</span> Status</h3>
                <div class="body-card flex">
                    <div class="body-card">
                        <div class="loading-overlay">
                            <div class="loading-animation"></div>
                        </div>
                        <img class="ptes" src="assets/home-motor.png" alt="gambar" />
                        <p class="ptes">Silahkan isi form untuk lacak pengiriman</p>
                        <table id='empTable' style='width:100%;padding:5px;'>
                            <thead>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="container-fill" class="display-true">
            <h3 class="title-section"><span>Lihat</span> Detail Servis</h3>
            <div class="progress-history" style="color:rgb(173, 169, 169);">Maybe, coming soon ..</div>
        </div>
    </section>
    <div id="user-name"
        data-nama="{{ Auth::check() ? 'Hi, ' . Auth::user()->nama . ' → ' . Auth::user()->role : 'Hwaloo guest!' }}">
    </div>
    {{-- Script Console --}}
    @if ($currentUserRole !== 'guest')
        <script>
            var currentUserRole = @json($currentUserRole);
            console.log("Role yang login: ", currentUserRole);
        </script>
    @endif
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
    {{-- Ambil Inputan --}}
    <script>
        // Cek apakah ada parameter 'search' pada URL
        const urlParams = new URLSearchParams(window.location.search);
        const searchValue = urlParams.get('search');

        // Jika parameter 'search' ada, isi nilai ke dalam input 'search'
        if (searchValue) {
            document.getElementById('search').value = searchValue;
            document.getElementById('but_search').click(); // Klik tombol "Cek Status" secara otomatis
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/iziToast.js') }}"></script>
    {{-- Menu bar rspnsv --}}
    <script>
        const mobileMenu = document.querySelector(".mobile-menu"),
            listMenu = document.querySelector(".list-menu");
        mobileMenu.addEventListener("click", () => {
            mobileMenu.classList.toggle("active");
            listMenu.classList.toggle("active");
        });
    </script>
    {{-- Ajax Search --}}
    <script type='text/javascript'>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {
            var isLoading = false; // Menyimpan status loading
            // Tampilkan efek loading-overlay saat permintaan AJAX dimulai
            $(document).ajaxStart(function() {
                if (isLoading) {
                    showElem(); // Tampilkan efek loading-overlay
                }
            });

            // Sembunyikan efek loading-overlay saat permintaan AJAX selesai
            $(document).ajaxStop(function() {
                hideElem();
            });

            // Fetch all records
            $('#but_fetchall').click(function() {
                $('.body-card .ptes').hide();
                isLoading = true; // Set status loading menjadi true

                // Tampilkan efek loading-overlay
                showElem();

                // Tambahkan jeda detik sebelum permintaan AJAX dimulai
                setTimeout(function() {
                    // AJAX GET request
                    $.ajax({
                        url: 'getTransaction',
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            createRows(response,
                                true
                            ); // Set isFetchAll menjadi true saat fetch all record
                        }
                    });
                }, 500); // Timeout ms
            });

            // Search by kode/nama
            $('#but_search').on('click', function(event) {
                event.preventDefault(); // Mencegah aksi default tombol submit
                var transactionKode = $('#search').val().trim();
                if (transactionKode === '') {
                    iziToast.error({
                        title: 'Kode/nama',
                        message: ' tidak boleh kosong ygy ..',
                        position: 'topRight',
                        timeout: 2000,
                        target: '#search-error-toast',
                        closeOnClick: true,
                        displayMode: 2,
                    });
                    return; // Jika inputan kosong, hentikan eksekusi fungsi
                }

                if (transactionKode.length < 2) {
                    iziToast.error({
                        title: 'Minimal',
                        message: 'masukkan 2-3 karakter ..',
                        position: 'topRight',
                        timeout: 2000,
                        target: '#search-error-toast',
                        closeOnClick: true,
                        displayMode: 2,
                    });
                    return; // Jika inputan kurang dari 2 karakter, hentikan eksekusi fungsi
                }

                isLoading = true; // Set status loading menjadi true

                if (transactionKode !== '') {
                    $('.body-card .ptes').hide();

                    // Tampilkan efek loading-overlay
                    showElem();

                    // Tambahkan jeda 2 detik sebelum permintaan AJAX dimulai
                    setTimeout(function() {
                        // AJAX POST request
                        $.ajax({
                            url: 'getTransactionbyid',
                            type: 'post',
                            data: {
                                _token: CSRF_TOKEN,
                                transactionKode: transactionKode
                            },
                            dataType: 'json',
                            success: function(response) {
                                createRows(response,
                                    false
                                ); // Set isFetchAll menjadi false saat melakukan search
                            }
                        });
                    }, 500); // Timeout 2 detik (2000 ms)
                }
            });
        });

        function showElem() {
            var loadingOverlay = document.getElementsByClassName("loading-overlay")[0];
            if (loadingOverlay) {
                loadingOverlay.style.visibility = "visible";
                $('.body-card .loading-overlay').show();
            }
        }

        function hideElem() {
            var loadingOverlay = document.getElementsByClassName("loading-overlay")[0];
            if (loadingOverlay) {
                loadingOverlay.style.visibility = "hidden";
                $('.body-card .loading-overlay').hide();
            }
        }

        // Create table rows
        function createRows(response, isFetchAll) {
            var len = 0;
            $('#empTable tbody').empty(); // Empty <tbody>
            if (response['data'] != null) {
                len = response['data'].length;
            }

            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var tr_str = "";

                    if (isFetchAll) {
                        // Tambahkan <th>No</th> jika melakukan fetch all record
                        tr_str += "<tr><th>No</th><td></td><td>" + (i + 1) + "</td></tr>";
                    }

                    var id = response['data'][i].id;
                    var kode = response['data'][i].kode;
                    var nama = response['data'][i].nama;
                    var merek = response['data'][i].merek;
                    var platnomer = response['data'][i].platnomer;
                    var status = response['data'][i].status;
                    var capitalizedStatus = status.charAt(0).toUpperCase() + status.slice(
                        1); // Merubah status menjadi huruf kapitalized

                    var statusClass = getStatusClass(status); //Add kelas CSS berdasarkan kondisi status

                    // Tambahkan data lain ke dalam baris tabel
                    tr_str += "<tr><th>Kode</th><th>:</th><td style='color:#301A4B;font-weight:bold;'>" + kode +
                        "</td></tr>" +
                        "<tr><th>Nama</th><th>:</th><td style='color:#6DB1BF;font-weight:bold;'>" + nama + "</td></tr>" +
                        "<tr><th>Merek</th><th>:</th><td>" + merek + "</td></tr>" +
                        "<tr><th>Plat Nomor</th><th>:</th><td>" + platnomer + "</td></tr>" +
                        "<tr><th>Status</th><th>:</th><td><a class='baten " + statusClass + "'>" + capitalizedStatus +
                        "</i></a></td></tr>";

                    if (isFetchAll) {
                        //Nambah tag <br> setiap data hanya saat fetch all
                        tr_str += "<tr><td colspan='3'><br><hr class='haer'></td></tr>";
                    }

                    $("#empTable tbody").append(tr_str);
                }
            } else {
                var tr_str = "<tr>" +
                    "<td align='center' colspan='4' class='tede'><b>No record found.</b></td>" +
                    "</tr>";

                $("#empTable tbody").append(tr_str);
            }
        }
        // Mendapatkan kelas CSS berdasarkan kondisi status
        function getStatusClass(status) {
            var statusClass = '';

            //Buat nentuin kelas CSS berdasarkan kondisi status
            if (status === 'Proses') {
                statusClass = 'baten-proses';
            } else if (status === 'Selesai') {
                statusClass = 'baten-selesai';
            }
            return statusClass;
        }
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
</body>

</html>
