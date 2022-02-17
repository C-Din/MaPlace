<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Http\Resources\Ticket as ResourcesTicket;
use App\Http\Resources\TicketCollection;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TicketCollection
     */
    public function index()
    {
        //return new TicketCollection(Ticket::where('state', '!=', -1)->paginate(10));
        return new TicketCollection(Ticket::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TicketRequest  $request
     * @return ResourcesTicket
     */
    public function store(TicketRequest $request)
    {
        $ticket = Ticket::create([
            'ticket_id' => $request->ticket_id,
            'event_id' => $request->event_id
        ]);

        return new ResourcesTicket($ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param  Ticket  $ticket
     * @return TicketCollection
     */
    public function show(Ticket $ticket)
    {
        return new TicketCollection($ticket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TicketRequest  $request
     * @param  Ticket  $ticket
     * @return ResourcesTicket
     */
    public function update(TicketRequest $request, Ticket $ticket)
    {
        $ticket->update([
            'ticket_id' => $request->ticket_id,
            'event_id' => $request->event_id,
            'state' => $request->state
        ]);

        return new ResourcesTicket($ticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Ticket  $ticket
     * @return void
     */
    public function destroy(Ticket $ticket)
    {
        //$ticket->update(['state' => -1]);
        $ticket->delete();
    }
}
