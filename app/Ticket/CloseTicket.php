<?php 

namespace App\Ticket;

use App\Models\Ticket;

class CloseTicket {

    /**
     * Handle the "close" method.
     * 
     * @param int $id
     * @return void 
     */
    public function close($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->ticket_status_id = 3;
        $ticket->save();
    }
}