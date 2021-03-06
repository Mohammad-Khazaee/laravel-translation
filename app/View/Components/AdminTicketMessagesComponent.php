<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminTicketMessagesComponent extends Component
{
    public $ticket;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-ticket-messages-component');
    }
}
