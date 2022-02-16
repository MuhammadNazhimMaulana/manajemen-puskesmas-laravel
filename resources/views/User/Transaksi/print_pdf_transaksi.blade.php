<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
        }
    </style>

    <title>Manajemen Puskesmas Online | Invoice {{ $title }}</title>
</head>

<body>
    <div style="font-size: 64px; color: '#dddddd'; "><i>Transaksi User</i></div>
    <p>
        <i>Bonevian Manajemen Puskesmas</i><br>
        Bandung, Indonesia <br>
        048124848
    </p>
    <p>
        Pembuat : {{ $laporan->user->name }}<br>
        No. Laporan : {{ $laporan->id_laporan }}<br>
        Tanggal : {{ $laporan->created_at->toDateString() }}
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Jumlah Pengunjung</strong></th>
            <th><strong>Jumlah Transaksi</strong></th>
            <th><strong>Periode Awal</strong></th>
            <th><strong>Periode Akhir</strong></th>
        </tr>
        <tr>
            <td>{{ $laporan->jumlah_pengunjung }}</td>
            <td>{{ $laporan->jumlah_transaksi }}</td>
            <td>{{ $laporan->periode_awal }}</td>
            <td>{{ $laporan->periode_akhir }}</td>
        </tr>
    </table>

</body>

</html>