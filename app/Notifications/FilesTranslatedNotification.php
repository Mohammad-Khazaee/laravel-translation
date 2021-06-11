<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FilesTranslatedNotification extends Notification
{
    use Queueable;
public $tries = 3;

    private $order;
    private $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order,$name)
    {
        $this->order = $order;
        $this->name = $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line( $this->order . '  سفارش شما ترجمه شد شماره سفارش '  .$this->name)
                    ->action('رفتن به سفارش', url(asset('orders')))
                    ->line('گروه مترجمین صبا');
    }
}
