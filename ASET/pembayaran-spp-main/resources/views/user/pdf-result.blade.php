<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pembayaran Siswa</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; font-size: 12px; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
        @media print {
            /* misal hide button */
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <h2>Laporan Pembayaran Siswa</h2>

    @if($pembayaran->isEmpty())
        <p>Tidak ada data pembayaran.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Siswa</th>
                    <th>NIS</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan Dibayar</th>
                    <th>Tahun Dibayar</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembayaran as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->siswa->nama }}</td>
                    <td>{{ $p->nis }}</td>
                    <td>{{ $p->tgl_bayar }}</td>
                    <td>{{ $p->bulan_dibayar }}</td>
                    <td>{{ $p->tahun_dibayar }}</td>
                    <td>{{ number_format($p->jumlah_bayar, 0, ',', '.') }}</td>
                    <td>{{ $p->keterangan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
