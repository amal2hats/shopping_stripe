<?php

include "libraries/payments/PaymentsBase.php";
class PaypalPayment implements Paymentmethod
{
    public function chargePayment()
    {
        echo 'payment succesful';
    }
}
