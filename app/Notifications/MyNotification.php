<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MyNotification extends Notification
{
    use Queueable;
    private $user;
    private $action;
    public function __construct($user, $action)
    {
        $this->user = $user;
        $this->action = $action;
    }
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->user['id'],
            'user_name' => $this->user['name'],
            'user_email' => $this->user['email'],
            'action' => $this->action,
        ];
    }
}