<?php
include "templates/header.php";
include "libraries/payments/StripePayment.php";
include "libraries/payments/PaypalPayment.php";
$payment = new StripePayment();
$payment->chargePayment();
