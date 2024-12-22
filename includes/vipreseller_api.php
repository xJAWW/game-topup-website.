<?php

function topup_vipreseller($game_id, $amount, $user_id, $payment_method) {
    $url = VIPRESELLER_API_URL . "/api/topup";

    $data = [
        'api_key' => VIPRESELLER_API_KEY,
        'game_id' => $game_id,
        'amount' => $amount,
        'user_id' => $user_id,
        'payment_method' => $payment_method,
    ];

    // Inisialisasi cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}
