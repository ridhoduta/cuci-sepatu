<!DOCTYPE html>
<html>
<head>
    <title>Cetak PDF</title>
    <style type="text/css">
        .tabel1 {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
            width: 100%;
        }

        .tabel1, th, td {
            border: 1px solid #999;
            padding: 8px 20px;
            text-align: left;
        }

        .footer-row {
            font-weight: bold;
            text-align: right;
            background-color: #f5f5f5;
        }

        .footer-value {
            text-align: left;
        }
    </style>
</head>
<body>
    <h4 align="center">Laporan Data Keuangan</h4>
    <table class="table table-bordered table-striped tabel1">
        <thead>
            <tr>
                <th style="width:5%">No.</th>
                <th style="width:15%">Kode Pesanan</th>
                <th style="width:20%">Tanggal Transaksi</th>
                <th style="width:20%">Total Pemasukkan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporanKeuangan as $lk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lk->transaksi->pesanan->kode_pesanan }}</td>
                    <td>{{ $lk->transaksi->tanggal_transaksi }}</td>
                    <td>Rp. {{ number_format($lk->total_pemasukan, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="footer-row">Total Pemasukkan</td>
                <td class="footer-value">Rp. {{ number_format($totalPemasukan, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
