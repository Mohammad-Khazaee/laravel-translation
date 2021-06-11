<?php

namespace App\Http\Middleware;

use App\Models\Ticket;
use Closure;
use Illuminate\Http\Request;

class isTicketClosed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ticket = Ticket::findOrFail($request->route()->parameters()['ticket']);
        
        if($ticket->ticket_status_id == 3){
            abort(404);
        }

        return $next($request);
    }
}
