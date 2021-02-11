<?php

namespace App\Billing;

use Str;
use App\Billing\PaymentGatewayContract;

class CreditPaymentGateway implements PaymentGatewayContract
{
    private $currency;
    private $discount;

    public function __construct($currency)
    {  
        $this->currency = $currency;
        $this->discount = 0;    
    }
    

    public function charge($amount)
    {

        $fees = $amount * 0.03;
        return [
            'amount' => ($amount - $this->discount) + $fees,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
            'fees' => $fees,
        ];
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }
}

