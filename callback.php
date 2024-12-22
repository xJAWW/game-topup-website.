<?php
// Callback untuk Tripay
// Verifikasi signature dan status transaksi

$data = $_POST;
$signature = $data['signature'];

// Verifikasi signature di sini

if ($data['status'] == 'PAID') {
    // Pembayaran berhasil, proses transaksi
    // Anda bisa menghubungi VIPReseller API untuk konfirmasi
    // atau melakukan tindakan lainnya
    echo "Pembayaran berhasil!";
} else {
    echo "Pembayaran gagal.";
}
