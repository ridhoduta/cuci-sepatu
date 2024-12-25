@extends('layouts.masterPelanggan')
@section('konten')
<div class="container">

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary text-white">
            <h6 class="m-0 font-weight-bold text-uppercase">Tambah Pesanan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('pelangganPesan') }}" method="POST">
                @csrf
                <!-- Input Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama Anda di sini" name="nama" value="{{ old('nama') }}">
                    @error('nama')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Input Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda di sini" name="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Input Kontak -->
                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" class="form-control" id="kontak" placeholder="Masukkan kontak Anda di sini" name="kontak" value="{{ old('kontak') }}">
                    @error('kontak')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Pilihan Jenis Barang -->
                <div class="mb-3">
                    <label for="jenis_barang" class="form-label">Jenis Barang</label>
                    <select name="jenis_barang" id="jenis_barang" class="form-select">
                        <option value="" data-harga="0">-- Pilih Jenis Barang --</option>
                        @foreach ($jenis_barang as $jb)
                        <option value="{{ $jb->id }}" data-harga="{{ $jb->harga_barang }}">{{ $jb->nama_barang }}</option>
                        @endforeach
                    </select>
                    <small id="hargaJenisBarang" class="text-muted mt-1 d-block">Harga: Rp 0</small>
                    @error('jenis_barang')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Input Merk Barang -->
                <div class="mb-3">
                    <label for="merkBarang" class="form-label">Merk Barang</label>
                    <input type="text" class="form-control" id="merkBarang" placeholder="Masukkan merk barang Anda" name="merkBarang" value="{{ old('merkBarang') }}">
                    @error('merkBarang')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Pilihan Layanan -->
                <div class="mb-3">
                    <label for="layanan_id" class="form-label">Layanan</label>
                    <select name="layanan_id" id="layanan_id" class="form-select">
                        <option value="" data-harga="0">-- Pilih Layanan --</option>
                        @foreach ($layanan as $l)
                        <option value="{{ $l->id }}" data-harga="{{ $l->harga }}">{{ $l->nama_layanan }}</option>
                        @endforeach
                    </select>
                    <small id="hargaLayanan" class="text-muted mt-1 d-block">Harga: Rp 0</small>
                    @error('layanan_id')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Total Harga -->
                <div class="mb-4">
                    <h5 class="fw-bold">Total Harga: Rp <span id="totalHargaDisplay">0</span></h5>
                    <input type="hidden" name="totalHarga" id="totalHargaInput">
                </div>
    
                <!-- Tombol Submit -->
                <div class="text-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="fas fa-save me-2"></i>Simpan Perubahan
                    </button>
                </div>
    
                <!-- Modal Konfirmasi -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Aksi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menyimpan perubahan?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-success"><i class="fas fa-check me-2"></i>Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script untuk menghitung harga -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const jenisBarangSelect = document.getElementById('jenis_barang');
        const hargaJenisBarangDisplay = document.getElementById('hargaJenisBarang');
        const layananSelect = document.getElementById('layanan_id');
        const hargaLayananDisplay = document.getElementById('hargaLayanan');
        const totalHargaDisplay = document.getElementById('totalHargaDisplay');
        const totalHargaInput = document.getElementById('totalHargaInput');

        let hargaBarang = 0;
        let hargaLayanan = 0;

        const calculateTotal = () => {
            const totalHarga = hargaBarang + hargaLayanan;
            totalHargaDisplay.textContent = totalHarga.toLocaleString('id-ID');
            totalHargaInput.value = totalHarga;
        };

        jenisBarangSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            hargaBarang = parseInt(selectedOption.getAttribute('data-harga')) || 0;
            hargaJenisBarangDisplay.textContent = `Harga: Rp ${hargaBarang.toLocaleString('id-ID')}`;
            calculateTotal();
        });

        layananSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            hargaLayanan = parseInt(selectedOption.getAttribute('data-harga')) || 0;
            hargaLayananDisplay.textContent = `Harga: Rp ${hargaLayanan.toLocaleString('id-ID')}`;
            calculateTotal();
        });

        calculateTotal();
    });
</script>       
@endsection
