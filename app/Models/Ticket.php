<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticketStatues()
    {
        return $this->belongsTo(TicketStatus::class , 'ticket_status_id' , 'id');
    }

    public function ticketMessages()
    {
        return $this->hasMany(TicketMessage::class);
    }

    //--------------------functions------------------------------

    public function save_new_ticket($request)
    {
        $ticket = new Ticket;
        $ticket->subject = $request['subject'];
        $ticket->content = $request['message'];
        $ticket->ticket_status_id = 1;
        $ticket->user_id = auth()->id();
        $ticket->save();
        return $ticket->id;
    }

}
