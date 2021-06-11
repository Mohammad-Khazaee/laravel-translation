<?php

namespace App\Http\Controllers;
use App\Http\Requests\createTicketRequest;
use App\Http\Requests\newTicketMessageRequest;
use App\Models\Ticket;
use App\Ticket\CreateNewMessage;
use App\Ticket\CreateTicket;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('ticketForUser')->only(['show', 'update','edit']);
        $this->middleware('isTicketClosed')->only(['show', 'update','edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->id() )->with('ticketStatues')->get();
        return view('ticket' , compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createTicketRequest $request,CreateTicket $createTicket)
    {
        $ticket = $createTicket->create($request->subject ,$request->message);
        return redirect('tickets/' . $ticket->id);
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
        return view('TicketMessages' , compact('ticket'));
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
        $createNewMessage->forUser($id , $request->message);
        return back();
    }
}
