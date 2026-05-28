<?php

$serverKey = "Mid-server-iMmSjsQRkUdyw2kQYcmIaHMi";

$orderId = $_GET['order_id'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,
"https://api.sandbox.midtrans.com/v2/$orderId/status");

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Basic " . base64_encode($serverKey . ":")
]);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);

if(curl_errno($ch)) {
    echo curl_error($ch);
} else {
    echo $result;
}