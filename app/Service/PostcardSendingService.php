<?php 

namespace App\Service;

use Illuminate\Support\Facades\Mail;

class PostcardSendingService 
{

    private $country;
    private $width;
    private $height;

    public function __construct($country, $width, $height)
    {
        $this->$country = $country;
        $this->$width = $width;
        $this->$height = $height;
    }

    public function hello($message, $email)
    {
        Mail::raw($message, function($message) use($email){
            $message->to($email);
        });

        //Mail out to some service
        dump('The postcard was sent with the message ' . $message);
    }
}