<script type = "text/javascript" >
    $(document).ready(function () {
        @if($message = Session::get('sukses'))
        iziToast.success({
            title: 'Hey',
            message: '{{$message}}',
            timeout: 5000,
            position: 'topRight',
            closeOnClick: true,
        });
        @elseif($message = Session::get('delete'))
        iziToast.warning({
            title: 'Hey',
            message: '{{$message}}',
            timeout: 5000,
            position: 'topRight',
            closeOnClick: true,
        });
        @elseif($message = Session::get('update'))
        iziToast.info({
            title: 'Hey',
            message: '{{$message}}',
            timeout: 5000,
            position: 'topRight',
            closeOnClick: true,
        });
        @endif
    }); 
</script>