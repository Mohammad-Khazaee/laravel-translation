<?php

namespace App\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class DeleteOrder{
    
    /**
     * Handle the "delete" method.
     * 
     * @param int $order_id
     * @return void
     */
    public function delete($order_id)
    {
     
        $file = Order::find($order_id)->files;
        $translated_file = Order::find($order_id)->translated_files;

        if(!empty(dirname(json_decode($file)))){
            Storage::disk('public')->deleteDirectory(dirname(json_decode($file)));    
        }
        if(!empty(dirname(json_decode($translated_file)))){
            Storage::disk('public')->deleteDirectory(dirname(json_decode($translated_file)));
        }

        Order::find($order_id)->delete();
    }
}