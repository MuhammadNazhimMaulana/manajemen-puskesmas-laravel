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
        Kepada : {{ $pembelian->user->first_name }}<br>
        No. Transaksi : {{ $pembelian->id_pembelian }}<br>
        Tanggal : {{ $pembelian->created_at->toDateString() }}
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>PPN</strong></th>
            <th><strong>Jumlah Pembayaran</strong></th>
            <th><strong>Status Pembayaran</strong></th>
        </tr>
        <tr>
            <td>{{ $pembelian->ppn }}</td>
            <td>{{ $pembelian->jumlah_bayar }}</td>
            <td>{{ $pembelian->status_pembayaran }}</td>
        </tr>
    </table>

</body>

</html>