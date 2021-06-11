<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class createNewOrderUserNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $orderid;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($Orderid){
        $this->orderid = $Orderid;
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
                    ->line('سفارش جدید در شبکه مترجمین صبا برای پیگیری سفارش خود لینک زیر را دنبال کنید')
                    ->action('دیدن سفارش', url('/orders/' . $this->orderid . '/edit'));
    }

}
