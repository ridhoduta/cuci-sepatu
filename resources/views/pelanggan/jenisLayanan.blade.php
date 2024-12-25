@extends('layouts.masterPelanggan')
@section('konten')
<style>
    /* Gaya umum untuk form */
.form-control {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 10px;
    font-size: 16px;
    transition: border-color 0.3s, box-shadow 0.3s;
}

/* Efek saat fokus */
.form-control:focus {
    border-color: #b51c1c; /* Warna merah */
    box-shadow: 0 0 5px rgba(181, 28, 28, 0.5);
    outline: none;
}

/* Label */
label {
    font-size: 14px;
    color: #333;
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
}

/* Tombol */
button {
    background-color: #b51c1c;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #a51717;
}

</style>
<div class="container mt-5">
    <div class="card p-5">
        <form action="{{ route('pelangganDatapesan') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="jenis-barang" class="form-label">Jenis Barang</label>
                <select name="jenis_barang" id="jenis_barang" class="form-control">
                    <option value="" data-harga="0">-- Pilih Jenis Barang --</option>
                    @foreach ($jenis_barang as $jb)
                    <option value="{{ $jb->id }}" data-harga="{{ $jb->harga_barang }}">{{ $jb->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="layanan" class="form-label">Layanan</label>
                <select name="layanan_id" id="layanan_id" class="form-control">
                    <option value="" data-harga="0">-- Pilih Layanan --</option>
                    @foreach ($layanan as $l)
                    <option value="{{ $l->id }}" data-harga="{{ $l->harga }}">{{ $l->nama_layanan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" name="merk" id="merk" class="form-control" placeholder="Masukkan Merk Barang Anda">
            </div>
            <div class="mb-3">
                <input type="hidden" name="totalHarga" id="totalHargaInput">
            </div>
            <div class="d-flex justify-content-between align-items-center mt-4">
                <button type="submit" class="btn btn-danger" id="btn-lanjutkan">Lanjutkan</button>
                <div class="total-harga">
                    <label for="total-harga" class="me-2">Total Harga:</label>
                    <span id="totalHargaDisplay" class="text-danger"></span>
                </div>
            </div>             
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Ambil elemen-elemen yang diperlukan
        const jenisBarangSelect = document.getElementById('jenis_barang');
        const layananSelect = document.getElementById('layanan_id');
        const totalHargaDisplay = document.getElementById('totalHargaDisplay');
        const totalHargaInput = document.getElementById('totalHargaInput');

        let hargaBarang = 0; // Harga default untuk barang
        let hargaLayanan = 0; // Harga default untuk layanan

        // Fungsi untuk menghitung total harga
        const calculateTotal = () => {
            const totalHarga = hargaBarang + hargaLayanan;
            // Format angka ke Rupiah
            const formattedHarga = `${totalHarga.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).replace('IDR', '').trim()}`;
            // Update tampilan dan input tersembunyi
            totalHargaDisplay.textContent = formattedHarga;
            totalHargaInput.value = totalHarga;
        };

        // Event listener untuk perubahan pada dropdown Jenis Barang
        jenisBarangSelect.addEventListener('change', () => {
            const selectedOption = jenisBarangSelect.options[jenisBarangSelect.selectedIndex];
            hargaBarang = parseInt(selectedOption.getAttribute('data-harga')) || 0; // Ambil harga barang
            calculateTotal();
        });

        // Event listener untuk perubahan pada dropdown Layanan
        layananSelect.addEventListener('change', () => {
            const selectedOption = layananSelect.options[layananSelect.selectedIndex];
            hargaLayanan = parseInt(selectedOption.getAttribute('data-harga')) || 0; // Ambil harga layanan
            calculateTotal();
        });

        // Inisialisasi awal
        calculateTotal();
    });
</script>

@endsection