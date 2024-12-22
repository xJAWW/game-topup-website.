<?php

// Fungsi untuk membuat signature Tripay
function generate_tripay_signature($data, $secret_key) {
    ksort($data);
    $string = '';
    foreach ($data as $key => $value) {
        $string .= $key . '=' . $value . '&';
    }
    $string = rtrim($string, '&');
    return hash_hmac('sha256', $string, $secret_key);
}

// Fungsi untuk mengirimkan request ke Tripay
function topup_tripay($order_id, $amount, $game_id, $phone_number) {
    $url = "https://api.tripay.co.id/merchant/transaction";

    $data = [
        'method' => 'bank_transfer',
        'merchant_ref' => $order_id,
        'amount' => $amount,
        'currency' => 'IDR',
        'phone' => $phone_number,
        'product_details' => $game_id,
        'customer_name' => 'Nama Pembeli',
        'order_items' => json_encode([
            ['name' => 'Top-up Game', 'price' => $amount, 'quantity' => 1]
        ]),
        'callback_url' => 'https://your-website/callback.php',
        'return_url' => 'https://your-website/thank-you.php',
    ];

    $data['signature'] = generate_tripay_signature($data, TRIPAY_SECRET_KEY);

    // Inisialisasi cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}
