<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Models\MyError;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use App\Mail\ErrorNotification;
use Carbon\Carbon;
class SMSalaService
{
    protected $client;
    protected $apiId;
    protected $apiPassword;
    protected $senderId;
    protected $callbackUrl;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->loadCredentials();
    }

    protected function loadCredentials()
    {
        $this->apiId = env('SMSALA_API_ID');
        $this->apiPassword = env('SMSALA_API_PASSWORD');
        $this->senderId = 'AX DXB';
        $this->callbackUrl = env('SMSALA_CALLBACK_URL');
        $this->baseUrl = env('SMSALA_BASE_URL');

        $this->checkRequiredCredentials();
    }

    protected function checkRequiredCredentials()
    {
        $missingCredentials = [];

        if (is_null($this->apiId)) {
            $missingCredentials[] = 'SMSALA_API_ID';
        }
        if (is_null($this->apiPassword)) {
            $missingCredentials[] = 'SMSALA_API_PASSWORD';
        }
        if (is_null($this->senderId)) {
            $missingCredentials[] = 'SMSALA_SENDER_ID';
        }
        if (is_null($this->callbackUrl)) {
            $missingCredentials[] = 'SMSALA_CALLBACK_URL';
        }
        if (is_null($this->baseUrl)) {
            $missingCredentials[] = 'SMSALA_BASE_URL';
        }

        if (!empty($missingCredentials)) {
            Artisan::call('config:clear');
            $this->loadCredentials(); // Reload credentials after clearing config

            if ($this->areCredentialsStillMissing()) {
                $errorMessage = 'Missing required SMSALA credentials: ' . implode(', ', $missingCredentials) . ' after config clear.';
                $this->logError($errorMessage);
                $this->sendErrorNotification($errorMessage);
            }
        }
    }

    protected function areCredentialsStillMissing()
    {
        return is_null($this->apiId) || is_null($this->apiPassword) || is_null($this->senderId) || is_null($this->callbackUrl) || is_null($this->baseUrl);
    }

    /**
     * @param $phoneNumber
     * @param $message
     * @return null|string
     */
    public function sendSMS($phoneNumber, $otp)
    {   $app_name = config('MailNoti');
        $otpMessage = "Dear User,\n\nYour One-Time Password (OTP) for $app_name is: $otp\n\nThis OTP is valid for the next 10 minutes. Please do not share this OTP with anyone for security reasons.\n\nIf you did not request this OTP, please contact our support immediately.\n\nThank you,\n$app_name Team";
        $payload = [
            'api_id' => $this->apiId,
            'api_password' => $this->apiPassword,
            'sms_type' => 'T', // T for transactional
            'encoding' => 'T',
            'sender_id' => $this->senderId,
            'phonenumber' => '+971555313488',
            'templateid' => null,
            'textmessage' => $otpMessage,
            'V1' => null,
            'V2' => null,
            'V3' => null,
            'V4' => null,
            'V5' => null,
            'ValidityPeriodInSeconds' => 60,
            'uid' => 'xyz',
            'callback_url' => $this->callbackUrl,
            'pe_id' => null,
            'template_id' => null
        ];

        try {
            $response = $this->client->post($this->baseUrl, [
                'json' => $payload,
            ]);

            $responseBody = json_decode($response->getBody(), true);

            if (isset($responseBody['status']) && $responseBody['status'] == 'S') {
                return 'SMS sent successfully.';
            } else {
           dd($response);exit;

                return 'SMS sent, but received unexpected response: ' . json_encode($responseBody);
            }
        } catch (RequestException $e) {
            $errorMessage = 'SMS sending failed: ' . $e->getMessage();

            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $errorMessage .= ' | Response: ' . $response->getBody();
            }

            $this->logError($errorMessage);
            $this->sendErrorNotification($errorMessage);
            return null;
        }
    }


    protected function logError($message)
    {
        MyError::create([
            'details' => $message,
            'st' => 0,
            'appindex' => 'SMS4646',
            'type' => 'SMSALA ERROR',
        ]);
    }

    protected function sendErrorNotification($errorMessage)
    {
        // Uncomment to send email notifications
//         $this->sendErrorEmail($errorMessage);
    }

    protected function sendErrorEmail($errorMessage)
    {
        $to = "zoya.shah13011@gmail.com";
        Mail::to($to)->send(new ErrorNotification($errorMessage));
    }

    protected function sendErrorSMS($errorMessage)
    {
        $time = Carbon::now()->format('Y-M-d h:i:s A');
        $phoneNumber = '+971555313488'; // Replace with actual phone number
        $message = $errorMessage.$time;
        $this->sendSMS($phoneNumber, $message);
    }
}