<?php

namespace Rubium\RedSms;
use Rubium\RedSms\Vendor\RedSms AS RedSmsClient;
use Rubium\RedSms\Classes\SMS;
use stdClass;

class RedSms
{
    /**
     * RedSms class
     * @var RedSmsClient
     */
    private RedSmsClient $_client;

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->_client = app('RedSmsClient');
    }

    /**
     * Send sms
     * @param string $phone
     * @param string $text
     * @return bool
     */
    public function send(string $phone,string $text):bool
    {

        $sms = $this->_client->sendSMS(
            $phone,
            $text,
            config('redsms.from')
        );
        
        return $sms['success'];
    }
}
