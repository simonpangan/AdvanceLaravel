<?php

namespace App\Billing;

use Str;
use App\Billing\PaymentGatewayContract;

class BankPaymentGateway implements PaymentGatewayContract
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

        return [
            'amount' => $amount - $this->discount,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
        ];
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }
}

