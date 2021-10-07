<?php
include "templates/header.php";
include "libraries/payments/PaymentsBase.php";
include "libraries/payments/StripePayment.php";

$payment = new StripePayment();
$payment->chargePayment();
