<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class showReject extends Component
{
    public $order_id;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.show-reject');
    }
}
