<?php

namespace App\View\Components;

use Illuminate\View\Component;

class adminTicketComponent extends Component
{
    public $tickets;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tickets)
    {
        $this->tickets = $tickets;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-ticket-component');
    }
}
