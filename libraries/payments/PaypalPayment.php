<?php
 
class PaypalPayment implements Paymentmethod
{
    public function charge()
    {
        echo 'payment succesful';
    }
}
