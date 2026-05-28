<?php

$serverKey = "Mid-server-iMmSjsQRkUdyw2kQYcmIaHMi";

$orderId = "ORDER-" . time();

$data = [
    "payment_type" => "qris",
    "transaction_details" => [
        "order_id" => $orderId,
        "gross_amount" => 50000
    ]
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,
"https://api.sandbox.midtrans.com/v2/charge");

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Basic " . base64_encode($serverKey . ":")
]);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$result = curl_exec($ch);

$response = json_decode($result, true);

$response["custom_order_id"] = $orderId;

echo json_encode($response);