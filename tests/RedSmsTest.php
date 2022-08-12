<?php
namespace Rubium\RedSms\Tests;

use App\User;
use Rubium\RedSms\Facades\RedSms;
use Rubium\RedSms\Notifications\RedSms as RedSmsNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
use Illuminate\Support\Facades\Notification;

class Test extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Send sms.
     *
     * .env.testing should have REDSMS_API_KEY
     * @return void
     */
    public function testSendSms()
    {
        $result = RedSms::send('89881234567', 'test');
        $this->assertTrue($result);
    }


    /**
     * Test notification.
     *
     * .env.testing should have REDSMS_API_KEY
     * @return void
     */
    public function testNotification()
    {
        Notification::fake();
        $user = User::first();
        $user->notify(new RedSmsNotification('test'));
        Notification::assertSentTo(
            $user,
            RedSmsNotification::class
        );
    }



}
