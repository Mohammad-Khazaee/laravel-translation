<?php

namespace App\Orders;

use App\Models\Order;
use App\Notifications\rejectOrderNotification;

class Reject {
 /**
     * Handle the "reject" method.
     * 
     * @param int $order_id
     * @param string $message
     * @return void
     */
    public function reject($order_id, $message)
    {
        Order::find($order_id)->update([
             'status_id' => 5
        ]);
 
        $user = Order::find($order_id)->User;
        $user->notify(new rejectOrderNotification($message));
    }   
}