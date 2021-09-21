<?php

declare(strict_types = 1);

namespace App\Services;

use Smsapi\Client\Curl\SmsapiHttpClient;
use Smsapi\Client\SmsapiClient;
use Smsapi\Client\Service\SmsapiComService;
use Smsapi\Client\Feature\Sms\Bag\SendSmsBag;

require_once 'vendor/autoload.php';

class SmsApi
{
    /**
     * Send sms from SMSAPI service.
     *
     * @param String $phoneNumber User's phone number
     * @param String $msg         SMS text
     * 
     * @return boolean
     */
    public function sendSms(String $phoneNumber, String $msg): bool
    {
        $apiToken = '82YSc1SOibHtMOBIjbb5EwDwXAXfu9pDmmRXrwvV';
        $client = new SmsapiHttpClient();
        $service = $client->smsapiPlService($apiToken);
        $sms = SendSmsBag::withMessage($phoneNumber, $msg);
        $service->smsFeature()->sendSms($sms);

        return true;
    }
}
