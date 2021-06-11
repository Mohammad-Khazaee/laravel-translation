<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\User;
use App\Notifications\createNewOrderUserNotification;
use App\Notifications\NotifyToAdminRoleNotification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function creating(Order $order)
    {
        $order->user_id = auth()->id();
        $order->status_id = 1; 
    }

    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        User::find(auth()->id())->notify(new createNewOrderUserNotification($order->id));
        FacadesNotification::send(User::role('Admin')->get(), new NotifyToAdminRoleNotification(Auth()->user()->email));
    }
}
