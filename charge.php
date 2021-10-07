<?php
include "templates/header.php";
include "libraries/payments/PaymentsBase.php";
include "libraries/payments/StripePayment.php";
include "libraries/payments/PaypalPayment.php";

$payment = new PaypalPayment();
$payment->chargePayment();
