<?php 

namespace App\Services;
use Twilio\Rest\Client;

class TwilioService
{
    protected $twilio;
    public function __construct()
    {
        $this->twilio = new Client(env('TWILIO_SID') , env('TWILIO_AUTH_TOKEN'));
    }

    public function sendOTP($to, $otp)
    {
        $message = "Hello , Your OTP for Awamine LLC is :{$otp} . if you have not requested you can contatct info@awamin.com for furthur detail.
        Awamine LLC Support team. ";
       
        try {
            $this->twilio->messages->create(
                "whatsapp:".$to,
                [
                    'from' => "whatsapp:+1999999999",
                    'body' => $message,
                ]
            );
        } catch (\Exception $e) {
            // Handle error
            echo "Error: " . $e->getMessage();
        }
    }
}

   
