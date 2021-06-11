<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    use HasFactory;

    public function ticket()
    {
        return $this->hasMany(Ticket::class , 'ticket_status_id' , 'id');
    }
}
