<?php

return [
    //Login
    'login' => env('REDSMS_LOGIN', ''),
    //API Key
    'api_key' => env('REDSMS_API_KEY', ''),

    'api_url' => env('REDSMS_API_URL', null),

    'from' => env('REDSMS_PHONE', ''), //

    'sms_sender_name' => env('REDSMS_SMS_SENDER_NAME', 'REDSMS.RU'), //

    'viber_sender_name' => env('REDSMS_VIBER_SENDER_NAME', 'REDSMS.RU'), //
];
