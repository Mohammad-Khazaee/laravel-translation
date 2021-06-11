<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrdersTableLivewire extends Component
{
    public $readyToLoad = false;

    public $result = 10;

    public function addMore()
    {
        $this->result += 10;
    }

    public function loadOrders()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        return view('livewire.orders-table-livewire', [
            'orders' => $this->readyToLoad
                ? Order::where('user_id' , auth()->id() )->orderByDesc('updated_at')->take($this->result)->get()
                : [],
        ]);
    }
}
