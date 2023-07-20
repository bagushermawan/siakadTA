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

    <title>Cek Status</title>
</head>

<body>
    <nav class="navbarr flex">
        <div class="logo"><a href="{{ route('/') }}"><img src="assets/logo.png" alt="logo" /></a></div>
        <div class="mobile-menu"><span></span></div>
        <ul class="list-menu flex">
            <li><a href="{{ route('/') }}#blog" target="_blank">Blog</a></li>
            <li><a href="{{ route('/') }}#tentang" target="_blank">Tentang kami</a></li>
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
                            <input class="teks" type='text' id='search' name='search'
                                placeholder='Masukkan kode/nama transaksi ..'>
                            <a class="btn btn-more track" value='Search' id='but_search'>
                                <i
                                    class="fa-regular fa-magnifying-glass"style="font-family: Font Awesome 5 Free; font-weight: 900"></i>
                                Cek Status
                            </a>
                            <input class="btn btn-more track" type='button' value='Fetch all records'
                                id='but_fetchall'>
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
            <div class="progress-history" style="color:rgb(173, 169, 169);">Coming soon ..</div>
        </div>
    </section>
    <div id="user-name" data-nama="{{ Auth::user()->nama }}"></div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mengambil elemen dengan id "user-name" dan mendapatkan nilai atribut data-nama
            var userNameElement = document.getElementById("user-name");
            var namauser = userNameElement.dataset.nama;

            // Menampilkan nama pengguna di console
            console.log("User yang login: " + "%c" + namauser, "font-weight: bold;color:gold;font-size:30px;");
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- Script Menu bar --}}
    <script>
        const mobileMenu = document.querySelector(".mobile-menu"),
            listMenu = document.querySelector(".list-menu");
        mobileMenu.addEventListener("click", () => {
            mobileMenu.classList.toggle("active");
            listMenu.classList.toggle("active");
        });
    </script>
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

                // Tambahkan jeda 2 detik sebelum permintaan AJAX dimulai
                setTimeout(function() {
                    // AJAX GET request
                    $.ajax({
                        url: 'getTransaction',
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            createRows(response);
                        }
                    });
                }, 500); // Timeout 2 detik (2000 ms)
            });

            // Search by userid
            $('#but_search').click(function() {
                var transactionKode = $('#search').val().trim();
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
                                createRows(response);
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
        function createRows(response) {
            var len = 0;
            $('#empTable tbody').empty(); // Empty <tbody>
            if (response['data'] != null) {
                len = response['data'].length;
            }

            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var id = response['data'][i].id;
                    var kode = response['data'][i].kode;
                    var nama = response['data'][i].nama;
                    var merek = response['data'][i].merek;
                    var platnomer = response['data'][i].platnomer;
                    var status = response['data'][i].status;
                    var capitalizedStatus = status.charAt(0).toUpperCase() + status.slice(
                        1); // Merubah status menjadi huruf kapitalized

                    var statusClass = getStatusClass(status); //Add kelas CSS berdasarkan kondisi status

                    var tr_str = "<tr>" +
                        "<th>No</th><th></th><td>" + (i + 1) + "</td>" + "</tr>" +
                        "<tr><th>Kode</th><th>:</th><td style='color:#301A4B;font-weight:bold;'>" + kode + "</td></tr>" +
                        "<tr><th>Nama</th><th>:</th><td style='color:#6DB1BF;font-weight:bold;'>" + nama + "</td></tr>" +
                        "<tr><th>Merek</th><th>:</th><td>" + merek + "</td></tr>" +
                        "<tr><th>Plat Nomor</th><th>:</th><td>" + platnomer + "</td></tr>" +
                        "<tr><th>Status</th><th>:</th><td><a class='baten " + statusClass + "'>" + capitalizedStatus +
                        "</i></a></td></tr>";

                    //Nambah tag <br> setiap data
                    tr_str += "<tr><td colspan='3'><br><hr class='haer'></td></tr>";

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
            if (status === 'proses') {
                statusClass = 'baten-proses';
            } else if (status === 'selesai') {
                statusClass = 'baten-selesai';
            }

            return statusClass;
        }
    </script>
</body>

</html>
