<?php

namespace App\Ticket;

use App\Models\Ticket;

class CreateTicket {

    /**
     * Handle the "create" method.
     * 
     * @param string $subject
     * @param string $message
     * @return Ticket
     */
    public function create($subject,$message)
    {
        $ticket = new Ticket;
        $ticket->subject = $subject;
        $ticket->content = $message;
        $ticket->save();
        
        return $ticket;
    }
}