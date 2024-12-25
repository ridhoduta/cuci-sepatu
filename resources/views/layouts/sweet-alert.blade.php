<div class="flash-message">
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ $message }}",
                icon: "success",
                confirmButtonText: "OK"
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                title: "Gagal!",
                text: "maaf",
                icon: "error",
                confirmButtonText: "Coba Lagi"
            });
        </script>
    @endif
</div>