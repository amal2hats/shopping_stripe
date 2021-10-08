<?php
include "templates/header.php";
include "libraries/payments/StripePayment.php";
include "libraries/payments/PaypalPayment.php";

$orders = new Order();
$totalAmt = 0;
$products = new Products();
foreach ($_SESSION['cart'] as $key => $item) {
    $prodDet = $products->get($key);
    $totalAmt += ($prodDet['price'] * $item['quantity']);
}

$payment = new StripePayment();
$charge  = $payment->charge($totalAmt);

if ($charge == null) {
    echo 'Payment failed';
} else {
    $orders->set($_SESSION['login_user'], $charge->id, $charge->status, json_encode($charge), json_encode($_SESSION['cart']), $totalAmt);
    unset($_SESSION['cart']);
    header("Location: index.php");
    die();
}
