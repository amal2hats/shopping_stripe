<?php
include "templates/header.php";
include "libraries/payments/StripePayment.php";
include "libraries/payments/PaypalPayment.php";

$orders = new Order();
$payment = new StripePayment();
$charge  = $payment->charge();

if ($charge == null) {
    echo 'Payment failed';
} else {
    $orders->set($_SESSION['login_user'], $charge->id, $charge->status, json_encode($charge), json_encode($_SESSION['cart']), (int)$_POST['totalAmt']);
    unset($_SESSION['cart']);
    header("Location: index.php");
    die();
}
