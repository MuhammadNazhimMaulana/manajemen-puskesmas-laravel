<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Memanggil Model
use App\Models\{Transaksi_Model, Pasien_Model, User};

class Transaksi_Controller_U extends Controller
{
    public function get_all()
    {
        $data = [
            "title" => "Transaksi",
            "transaksi" => Transaksi_Model::filterTransaksi(request(['cari_transaksi']))->paginate(5)
        ];

        return view('User/Transaksi/view_transaksi_user', $data);
    }

    public function view_transaksi(int $id)
    {
        $transaksi = Transaksi_Model::where('id_transaksi', $id)->first();

        $data = [
            "title" => "Transaksi",
            "transaksi" => $transaksi,
        ];

        return view('User/Transaksi/view_user_specific_transaction', $data);
    }

    public function pembayaran_transaksi(int $id)
    {
        // Getting value of transaction
        $transaksi = Transaksi_Model::where('id_transaksi', $id)->first();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $transaksi->biaya_pembayaran,
            ),
            'customer_details' => array(
                'first_name' => $transaksi->user->first_name,
                'last_name' => $transaksi->user->last_name,
                'email' => 'budi.pra@example.com',
                'phone' => $transaksi->user->no_hp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $data = [
            "title" => "Transaksi",
            "transaksi" => $transaksi,
            "snapToken" => $snapToken
        ];

        return view('User/Transaksi/update_transaksi_user', $data);
    }
}
