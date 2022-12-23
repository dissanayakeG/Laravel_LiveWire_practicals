<?php


namespace App\Facades;


use Illuminate\Support\Facades\Mail;

class EmailService
{
    private $country;
    private $width;
    private $height;

    public function __construct($country, $width, $height)
    {
        $this->country = $country;
        $this->width = $width;
        $this->height = $height;
    }

    public function hello()
    {
       dd('OK, I\'ll send the mail');
    }

}
