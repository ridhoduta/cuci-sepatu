@extends('layouts.masterAdmin')
@section('title', 'Tambah Pesanan')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Tambah Pesanan
        </h6>
    </div>
    <div class="card-body">
        <form action="{{ route('pesanan.tambah')}}" method="POST">
            @csrf
            <!-- Input Jenis Barang -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" placeholder="Masukkan nama anda disini" name="nama" value="{{ old('nama') }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Masukkan email anda disini" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" class="form-control" placeholder="Masukkan kontak anda disini" name="kontak" value="{{ old('kontak') }}">
                @error('kontak')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jenisBarang" class="form-label">Jenis Barang</label>
                <select name="jenis_barang" id="jenis_barang" class="form-control">
                    <option value="" data-harga="0">-- Pilih Jenis Barang --</option>
                    @foreach ($jenis_barang as $jb)
                    <option value="{{ $jb->id }}" data-harga="{{ $jb->harga_barang }}">{{ $jb->nama_barang }}</option>
                    @endforeach
                </select>
                <small id="hargaJenisBarang" class="text-muted">Harga: Rp 0</small>
                @error('jenis_barang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="merkBarang" class="form-label">Merk Barang</label>
                <input type="text" class="form-control" id="merkBarang" placeholder="Masukkan merk barang anda" name="merkBarang" value="{{ old('merkBarang') }}">
                @error('merkBarang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            
            <div class="mb-3">
                <label for="layananId" class="form-label">Layanan</label>
                <select name="layanan_id" id="layanan_id" class="form-control">
                    <option value="" data-harga="0">-- Pilih Layanan --</option>
                    @foreach ($layanan as $l)
                    <option value="{{ $l->id }}" data-harga="{{ $l->harga }}">{{ $l->nama_layanan }}</option>
                    @endforeach
                </select>
                <small id="hargaLayanan" class="text-muted">Harga: Rp 0</small>
                @error('layanan_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            

            <div class="mb-3">
                <h3>Total Harga: Rp <span id="totalHargaDisplay">0</span></h3>
                <input type="hidden" name="totalHarga" id="totalHargaInput">
            </div>
            
            <!-- Tombol Submit -->
            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Simpan Perubahan
            </button>

            <!-- Modal Konfirmasi -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Aksi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Yakin ingin menyimpan perubahan?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Ambil elemen yang dibutuhkan
        const jenisBarangSelect = document.getElementById('jenis_barang');
        const hargaJenisBarangDisplay = document.getElementById('hargaJenisBarang');
        const layananSelect = document.getElementById('layanan_id');
        const hargaLayananDisplay = document.getElementById('hargaLayanan');
        const totalHargaDisplay = document.getElementById('totalHargaDisplay');
        const totalHargaInput = document.getElementById('totalHargaInput')

        let hargaBarang = 0;
        let hargaLayanan = 0;

        // Fungsi untuk menghitung dan menampilkan total harga
        const calculateTotal = () => {
            const totalHarga = hargaBarang + hargaLayanan;
            totalHargaDisplay.textContent = totalHarga.toLocaleString('id-ID');
            totalHargaInput.value = totalHarga;
        };

        // Event untuk jenis barang
        jenisBarangSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            hargaBarang = parseInt(selectedOption.getAttribute('data-harga')) || 0;
            hargaJenisBarangDisplay.textContent = `Harga: Rp ${hargaBarang.toLocaleString('id-ID')}`;
            calculateTotal();
        });

        // Event untuk layanan
        layananSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            hargaLayanan = parseInt(selectedOption.getAttribute('data-harga')) || 0;
            hargaLayananDisplay.textContent = `Harga: Rp ${hargaLayanan.toLocaleString('id-ID')}`;
            calculateTotal();
        });

        // Inisialisasi awal
        calculateTotal();
    });
</script>






@endsection
