<?php

namespace App\Orders;

use App\Models\Order;
use App\Models\User;
use App\Notifications\CostForUserNotification;

class SetCost {
    /**
     * Handle the "set" method.
     * 
     * @param int $order_id
     * @param int|string $cost
     * @param $date
     * @return void
     */
    public function set($order_id,$cost,$date)
    {        
        Order::find($order_id)->update([
            'cost' => $cost,
            'date' => $date,
            'status_id' => 2
        ]);
        User::find(auth()->id())->notify(new CostForUserNotification($cost,asset('OrderStatus'),auth()->user()->name));
    }
}