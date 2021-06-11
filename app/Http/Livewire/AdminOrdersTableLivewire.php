<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class AdminOrdersTableLivewire extends Component
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
        return view('livewire.admin-orders-table-livewire', [
            'orders' => $this->readyToLoad
                ? Order::orderByDesc('updated_at')->take($this->result)->get()
                : [],
        ]);
    }
}
