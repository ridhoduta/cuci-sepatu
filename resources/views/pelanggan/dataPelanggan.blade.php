@extends('layouts.masterPelanggan')
@section('konten')
<style>
    .card {
    border: none;
    border-radius: 8px;
    height: 80vh;
}

.form-control {
    border-radius: 6px;
    transition: all 0.3s ease-in-out;
}

.form-control:focus {
    border-color: #b51c1c;
    box-shadow: 0 0 5px rgba(181, 28, 28, 0.5);
}

button {
    background-color: #b51c1c;
    color: white;
    border: none;
    border-radius: 6px;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #a51717;
}

</style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-4">
                <h5 class="card-title text-center mb-4">Data Pesanan</h5>
                <!-- Form Data Diri -->
                <form action="{{ route('pelangganPesan') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <!-- Informasi Pelanggan -->
                        <div class="form-group">
                            <label for="nama" class="form-label"><i class="fas fa-user me-2"></i>Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama Anda" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="email" class="form-label"><i class="fas fa-envelope me-2"></i>Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email Anda" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="kontak" class="form-label"><i class="fas fa-phone me-2"></i>Kontak</label>
                            <input type="text" id="kontak" name="kontak" class="form-control" placeholder="Masukkan Nomor Kontak Anda" required>
                        </div>
                    </div>

                    <!-- Informasi Pesanan -->
                    <h6 class="fw-bold">Informasi Pesanan</h6>
                    <ul class="list-group mb-4">
                        <li class="list-group-item">
                            <strong>Jenis Barang:</strong> {{ $jenisBarang->nama_barang }}
                        </li>
                        <li class="list-group-item">
                            <strong>Layanan:</strong> {{ $layanan->nama_layanan }}
                        </li>
                        <li class="list-group-item">
                            <strong>Merk:</strong> {{ $merk }}
                        </li>
                        <li class="list-group-item">
                            <strong>Total Harga:</strong> Rp {{ number_format($totalHarga, 0, ',', '.') }}
                        </li>
                    </ul>

                    <!-- Hidden Input untuk Data Pesanan -->
                    <input type="hidden" name="jenis_barang_id" value="{{ $jenisBarang->id }}">
                    <input type="hidden" name="layanan_id" value="{{ $layanan->id }}">
                    <input type="hidden" name="merk" value="{{ $merk }}">
                    <input type="hidden" name="total_harga" value="{{ $totalHarga }}">

                    <!-- Tombol Pesan -->
                    <div class="text-end">
                        <button class="btn btn-danger px-4" type="submit">Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
