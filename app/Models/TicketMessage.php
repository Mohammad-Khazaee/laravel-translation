<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
    use HasFactory;

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function new_ticket_messasge($ticket_id ,$message)
    {
        $ticketMessage = new TicketMessage;
        $ticketMessage->ticket_id = $ticket_id;
        $ticketMessage->user_id = auth()->id();
        $ticketMessage->message = $message;
        $ticketMessage->save();
    }

    public function new_admin_ticket_messasge($ticket_id ,$message)
    {
        $ticketMessage = new TicketMessage;
        $ticketMessage->ticket_id = $ticket_id;
        $ticketMessage->agent_id = auth()->id();
        $ticketMessage->message = $message;
        $ticket = Ticket::find($ticket_id);
        $ticket->ticket_status_id = 2 ;
        $ticket->save();
        $ticketMessage->save();
    }
}
