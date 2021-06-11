<?php

namespace App\Http\Controllers;

use App\Http\Requests\newTicketMessageRequest;
use App\Models\Ticket;
use App\Ticket\CloseTicket;
use App\Ticket\CreateNewMessage;

class AdminTicketController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::with('ticketStatues')->get();
        return view('Admin.tickets' , compact('tickets'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::with('ticketMessages')->find($id);
        return view('Admin.TicketMessages' , compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(newTicketMessageRequest $request, $id,CreateNewMessage $createNewMessage)
    {
        $createNewMessage->forAdmin($id , $request->message);
        return back();
    }

    public function close($id , CloseTicket $closeTicket)
    {
        $closeTicket->close($id);
        return redirect('/admin/tickets')->with('status', __('Closing ticket was successful'));
    }
}