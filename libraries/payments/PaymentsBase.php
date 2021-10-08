<?php

interface PaymentMethod
{
    public function charge($totalAmount);
}
