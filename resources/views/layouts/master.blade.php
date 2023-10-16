<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/select2/dist/css/select2.min.css">


    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/css/iziToast.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="/assets/css/stislacolorchanger.css">
    @stack('page-css')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('layouts.header')
            @include('layouts.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('header')</h1>
                        @yield('button-header')
                        <div class="section-header-breadcrumb">
                            {{-- <?php $link = ''; ?>
              @for ($i = 1; $i <= count(Request::segments()); $i++)
                  @if (($i < count(Request::segments())) & ($i > 0))
                  <?php $link .= '/' . Request::segment($i); ?>
                  <div class="breadcrumb-item"> <a href="<?= $link ?>">{{ ucwords(str_replace('/',' ',Request::segment($i)))}}</a></div>
                  @else {{ucwords(str_replace('-',' ',Request::segment($i)))}}
                  @endif
              @endfor --}}
                            <?php $segments = ''; ?>
                            @foreach (Request::segments() as $segment)
                                <?php $segments .= '/' . $segment; ?>
                                <div class="breadcrumb-item">
                                    <a href="{{ ucwords($segments) }}">{{ ucwords($segment) }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @yield('content')
                </section>
            </div>
            <div class="darkmode card-b fas fa-moon"></div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad
                        Nauval Azhar</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
            <div id="layout-skins-changer">
                <div class="skin-btn bg-primary" data-toggle="tooltip" data-placement="left"
                    data-original-title="Choose layout skins">
                    <i class="fas fa-palette animated"></i>
                </div>

                <a href="#" class="skin-btn bg-default" data-toggle="tooltip" data-placement="left"
                    data-original-title="Default" data-value="default">
                    <i class="fas fa-check ml-0"></i>
                </a>
                <a href="#" class="skin-btn skin-cyan" data-toggle="tooltip" data-placement="left"
                    data-original-title="Layout Cyan" data-value="cyan">
                    <i class="ml-0"></i>
                </a>
                <a href="#" class="skin-btn skin-green" data-toggle="tooltip" data-placement="left"
                    data-original-title="Layout Green" data-value="green">
                    <i class="ml-0"></i>
                </a>
                <a href="#" class="skin-btn skin-orange" data-toggle="tooltip" data-placement="left"
                    data-original-title="Layout Orange" data-value="orange">
                    <i class="ml-0"></i>
                </a>
                <a href="#" class="skin-btn skin-red" data-toggle="tooltip" data-placement="left"
                    data-original-title="Layout Red" data-value="red">
                    <i class="ml-0"></i>
                </a>
                <a href="#" class="skin-btn skin-grey" data-toggle="tooltip" data-placement="left"
                    data-original-title="Layout Grey" data-value="grey">
                    <i class="ml-0"></i>
                </a>
                <a href="#" class="skin-btn skin-dark" data-toggle="tooltip" data-placement="left"
                    data-original-title="Layout Dark" data-value="dark">
                    <i class="ml-0"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://demo.getstisla.com/assets/modules/tooltip.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="https://demo.getstisla.com/assets/modules/summernote/summernote-bs4.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/datatables/datatables.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="https://demo.getstisla.com/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="{{ asset('assets/js/iziToast.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



    <!-- Page Specific JS File -->
    @include('layouts.izitoast')


    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/custom.js"></script>
    <script src="/assets/js/stislacolorchanger.js"></script>
    <script>
        // Fungsi untuk mereset formulir
        function resetForm() {
            document.getElementById("myForm").reset();
        }
    </script>
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
    
    @stack('page-script')

    <!-- Page Specific JS File -->
</body>

</html>
