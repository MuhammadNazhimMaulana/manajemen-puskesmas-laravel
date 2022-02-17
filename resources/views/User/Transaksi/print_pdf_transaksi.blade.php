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
        Kepada : {{ $transaksi->user->name }}<br>
        No. Transaksi : {{ $transaksi->id_transaksi }}<br>
        Tanggal : {{ $transaksi->created_at->toDateString() }}
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Jumlah Pembayaran</strong></th>
            <th><strong>Keterangan Pembayaran</strong></th>
            <th><strong>Tanggal Bayar</strong></th>
        </tr>
        <tr>
            <td>{{ $transaksi->biaya_pembayaran }}</td>
            <td>{{ $transaksi->ket_pembayaran }}</td>
            <td>{{ $transaksi->tanggal_bayar }}</td>
        </tr>
    </table>

</body>

</html>