<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'files',
        'translated_files',
        'status_id',
        'cost',
        'date'
    ];
    
    // relationships ------------------------>

    public function status()
    {
        return $this->belongsTo(status::class);
    }

    public function orderDetails()
    {
        return $this->hasOne(OrderDetail::class);
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }


    public function Update_status_for_sending_translated_files($order_id,$zip_path)
    {
        $order_for_change_status = Order::find($order_id);
        $order_for_change_status->status_id = 4;
        $order_for_change_status->translated_files = $zip_path;
        $result = $order_for_change_status->save();

        return $result;
    }

    public function Update_status_for_cost($id , $cost , $date)
    {
        $order = Order::find($id);
        $order->cost = $cost;
        $order->date = $date;
        $order->status_id = 2;
        $result = $order->save();

        return $result;
    }

    public function change_status_for_rejecting($order_id)
    {
        $order = Order::find($order_id);
        $order->status_id = 5;
        $result = $order->save();

        return $result;
    }
}
