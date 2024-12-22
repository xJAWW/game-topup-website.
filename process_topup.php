<?php
require_once 'includes/config.php';
require_once 'includes/tripay_api.php';
require_once 'includes/vipreseller_api.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $game_id = $_POST['game_id'];
    $amount = $_POST['amount'];
    $phone = $_POST['phone'];

    // Misalnya, kita pilih untuk menggunakan Tripay untuk transaksi
    $order_id = 'ORD' . time(); // ID unik untuk transaksi
    $result = topup_tripay($order_id, $amount, $game_id, $phone);

    if ($result['status'] == 'SUCCESS') {
        echo "Top-up berhasil! Silakan lakukan pembayaran.";
        // Redirect atau proses lebih lanjut sesuai hasil
    } else {
        echo "Terjadi kesalahan: " . $result['message'];
    }
}
