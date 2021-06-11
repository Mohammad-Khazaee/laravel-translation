<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class showOrder extends Component
{
    public $order;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($order){
        $this->order = $order;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.show-order');
    }
}
