<!DOCTYPE html>
<html>
<head>
    <title>Cetak PDF</title>
    <style type="text/css">
        .tabel1 {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
        }

        .tabel1, th, td {
            border: 1px solid #999;
            padding: 8px 20px;
        }
    </style>
</head>
<body>
    <h4 align="center">Laporan Data Keuangan</h4>
    <table class="table table-bordered table-striped tabel1">
        <thead>
            <tr>
                <th style="width:5%">No.</th>
                <th style="width:7%">Kode Pesanan</th>
                <th style="width:12%">Tanggal Transaksi</th>
                <th style="width:12%">Total Pemasukan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporanKeuangan as $lk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lk->transaksi->pesanan->kode_pesanan }}</td>
                    <td>{{ $lk->transaksi->tanggal_transaksi }}</td>
                    <td>Rp.{{ number_format($lk->total_pemasukan, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
