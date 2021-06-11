<?php

namespace App\Observers;

use App\Models\Ticket;

class TicketObserver
{
    /**
     * Handle the Ticket "creating" event.
     * 
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function creating(Ticket $ticket)
    {
        $ticket->user_id = auth()->id();
        $ticket->ticket_status_id = 1;
    }
}
