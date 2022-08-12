<?php
namespace Rubium\RedSms\Channels;
use Rubium\RedSms\Facades\RedSms;
use Illuminate\Notifications\Notification;

class RedSmsChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toSms($notifiable);
        RedSms::send($data['phone'], $data['message']);
    }
}
