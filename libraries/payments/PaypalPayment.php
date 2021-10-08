<?php
 
class PaypalPayment implements Paymentmethod
{
    public function charge($totalAmount)
    {
        echo 'payment succesful';
    }
}
