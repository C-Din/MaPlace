<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketTypeRequest;
use App\Http\Resources\TicketType as ResourcesTicketType;
use App\Http\Resources\TicketTypeCollection;
use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TicketTypeCollection
     */
    public function index()
    {
        //return new TicketTypeCollection(TicketType::where('state', '!=', -1)->paginate(10));
        return new TicketTypeCollection(TicketType::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TicketType  $request
     * @return ResourcesTicketType
     */
    public function store(TicketType $request)
    {
        $ticketType = TicketType::created([
            'name' => $request->name,
            'price' => $request->price,
            'sector' => $request->sector,
            'location_id' => $request->location_id
        ]);

        return new ResourcesTicketType($ticketType);
    }

    /**
     * Display the specified resource.
     *
     * @param  TicketType  $ticketType
     * @return TicketTypeCollection
     */
    public function show(TicketType $ticketType)
    {
        return new TicketTypeCollection($ticketType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TicketTypeRequest  $request
     * @param  TicketType  $ticketType
     * @return ResourcesTicketType
     */
    public function update(TicketTypeRequest $request, TicketType $ticketType)
    {
        $ticketType->update([
            'name' => $request->name,
            'price' => $request->price,
            'sector' => $request->sector,
            'location_id' => $request->location_id,
            'state' => $request->state
        ]);

        return new ResourcesTicketType($ticketType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TicketType  $ticketType
     * @return void
     */
    public function destroy(TicketType $ticketType)
    {
        //$ticketType->update(['state' => -1]);
        $ticketType->delete();
    }
}
