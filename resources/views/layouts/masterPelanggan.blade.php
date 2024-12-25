<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Pelanggan</title>
</head>
<body>
    
    @include('layouts.navbarPelanggan')
    @yield('konten')
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    title: "Berhasil",
                    text: "{{ $message }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            </script>
    @endif
    @if ($message = Session::get('error'))
    <script>
        Swal.fire({
            title: "Error",
            text: "{{ $message }}",
            icon: "error",
            confirmButtonText: "OK"
        });
    </script>
@endif
</html>