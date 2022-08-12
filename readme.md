# Laravel redsms.ru notifications 

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Travis](https://img.shields.io/travis/Rubium/yandex-money-checkout.svg?style=flat-square)]()
[![Total Downloads](https://img.shields.io/packagist/dt/Rubium/yandex-money-checkout.svg?style=flat-square)](https://packagist.org/packages/Rubium/yandex-money-checkout)

## Install
`composer require rubium/redsms`

`php artisan vendor:publish --provider="Rubium\RedSms\RedSmsServiceProvider"`

## Usage
Package for send sms via redsms.ru. Based on official PHP class https://github.com/redsms/api-samples-php.
This is package provide Channel and base Notification.

Create file `config/redsms.php` with content: (For details please read documentation https://redsms.ru/integration/api/):

```
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
```

Examples:
    
notify method (notifiable should have phone property): 
   
    use Rubium\RedSms\Notifications\RedSms;
    ...
    $user->notify(new RedSms('test'));

In Notification:

      public function via($notifiable)
      {
            return [RedSmsChannel::class];
      }   

      public function toSms($notifiable)
      {
            return [
                  'phone' => $this->phone,
                  'message' => $this->message
            ];
      }
      
Facade:

    RedSms::send('89881234567', 'test'); // return bool



## Testing
Run the tests with:

``` bash
vendor/bin/phpunit
```

## Credits

- [Rubium Web](https://github.com/rubium-web)

## Security
If you discover any security-related issues, please email hello@rubium.ru instead of using the issue tracker.

## License
The MIT License (MIT). Please see [License File](/LICENSE.md) for more information.
