<?php 

namespace App\Ticket;

use App\Models\Ticket;
use App\Models\TicketMessage;

class CreateNewMessage {

    /**
     * Handle forUser method.
     * 
     * @param int $ticket_id
     * @param string $message
     * 
     * @return void
     */
    public function forUser($ticket_id , $message)
    {
        $ticketMessage = new TicketMessage;
        $ticketMessage->ticket_id = $ticket_id;
        $ticketMessage->user_id = auth()->id();
        $ticketMessage->message = $message;
        $ticketMessage->save();
    }

    /**
     * Handle forUser method.
     * 
     * @param int $ticket_id
     * @param string $message
     * 
     * @return void
     */   
    public function forAdmin($ticket_id , $message)
    {
        $ticketMessage = new TicketMessage;
        $ticketMessage->ticket_id = $ticket_id;
        $ticketMessage->agent_id = auth()->id();
        $ticketMessage->message = $message;
        $ticketMessage->save();

        $ticket = Ticket::find($ticket_id);
        $ticket->ticket_status_id = 2 ;
        $ticket->save();
    }
}