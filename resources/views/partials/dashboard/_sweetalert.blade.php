@if (Session::has('sweetalert'))
    swal({
        title: "{!! Session::get('sweetalert')['title'] !!}",
        type: "{!! Session::get('sweetalert')['type'] !!}",
        showConfirmButton: true
    });
@endif
