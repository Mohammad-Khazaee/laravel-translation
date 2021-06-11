<?php

namespace App\Http\Livewire;

use App\Models\TicketMessage;
use Livewire\Component;

class TicketMessageLivewire extends Component
{
    public $ticket;

    public $message = '';


    public function Send()
    {
        $ticketMessage = new TicketMessage;
        $ticketMessage->ticket_id = $this->ticket->id;
        $ticketMessage->user_id = auth()->id();
        $ticketMessage->message = $this->message;
        $ticketMessage->save();
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.ticket-message-livewire');
    }
}
