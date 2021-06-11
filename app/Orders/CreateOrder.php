<?php

namespace App\Orders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Notifications\createNewOrderUserNotification;
use App\Services\ZipCreator;

class CreateOrder {
    /**
     * Handle the "create" method.
     * 
     * "files" => array
     * "title" => "value"
     * "translation_mode" => "value"
     * "Expected_date" => "value"
     * "source_language" => "value"
     * "destination_language" => "value"
     * "message" => "value"
     * 
     * @param array $validated
     * @param $files
     * @return App\Models\Order
     */
    public function create($validated)
    {
        $zipCreator = new ZipCreator;
        $json_path_zip = $zipCreator->CreateZip($validated['files']);  

        $order = Order::create(['files' => $json_path_zip ]);

        unset($validated['files']);
        $validated['order_id'] = $order->id;
        if (empty($validated['Expected_date'])) {
            unset($validated['Expected_date']);
        }

        OrderDetail::create($validated);

        return $order;
    }
}