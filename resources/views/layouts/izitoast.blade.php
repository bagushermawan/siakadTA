<script type="text/javascript">
    $(document).ready(function() {
        @if ($message = Session::get('sukses'))
            iziToast.success({
                title: 'Hey',
                message: '{{ $message }}',
                timeout: 5000,
                position: 'topRight',
                closeOnClick: true,
            });
        @elseif ($message = Session::get('delete'))
            iziToast.warning({
                title: 'Hey',
                message: '{{ $message }}',
                timeout: 5000,
                position: 'topRight',
                closeOnClick: true,
            });
        @elseif ($message = Session::get('update'))
            iziToast.info({
                title: 'Hey',
                message: '{{ $message }}',
                timeout: 5000,
                position: 'topRight',
                closeOnClick: true,
            });
        @elseif ($message = Session::get('gagal'))
            iziToast.warning({
                title: 'Oh no!!',
                message: '{{ $message }}',
                timeout: 5000,
                position: 'topRight',
                closeOnClick: true,
            });

            // Login
        @elseif ($message = Session::get('login'))
            iziToast.success({
                title: 'Haloo <b>{{ Auth::user()->nama }}</b>!!',
                message: '{{ $message }}',
                timeout: 5000,
                position: 'topCenter',
                closeOnClick: true,
            });
        @elseif ($message = Session::get('error'))
            iziToast.error({
                theme: 'light',
                icon: '',
                titleLineHeight: '30',
                messageLineHeight: '30',
                image: '/assets/waduh.jpg',
                imageWidth: 70,
                title: 'waduuu, ',
                message: '{{$message}}',
                timeout: 5000,
                position: 'topCenter',
                closeOnClick: true,
            });
        @endif
    });
</script>
