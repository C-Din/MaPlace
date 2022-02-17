<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTicketRequest;
use App\Http\Resources\UserTicket as ResourcesUserTicket;
use App\Http\Resources\UserTicketCollection;
use App\Models\UserTicket;
use Illuminate\Http\Request;

class UserTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return UserTicketCollection
     */
    public function index()
    {
        //return new UserTicketCollection(UserTicket::where('state', '!=', -1)->paginate(10));
        return new UserTicketCollection(UserTicket::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserTicketRequest  $request
     * @return ResourcesUserTicket
     */
    public function store(UserTicketRequest $request)
    {
        $userTicket = UserTicket::create([
            'ticket_id' => $request->ticket_id,
            'payment_id' => $request->payment_id
        ]);

        return new ResourcesUserTicket($userTicket);
    }

    /**
     * Display the specified resource.
     *
     * @param  UserTicket  $userTicket
     * @return UserTicketCollection
     */
    public function show(UserTicket $userTicket)
    {
        return new UserTicketCollection($userTicket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserTicketRequest  $request
     * @param  UserTicket  $userTicket
     * @return ResourcesUserTicket
     */
    public function update(UserTicketRequest $request, UserTicket $userTicket)
    {
        $userTicket->update([
            'ticket_id' => $request->ticket_id,
            'payment_id' => $request->payment_id,
            'state' => $request->state
        ]);

        return new ResourcesUserTicket($userTicket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UserTicket  $userTicket
     * @return void
     */
    public function destroy(UserTicket $userTicket)
    {
        //$userTicket->update(['state' => -1]);
        $userTicket->delete();
    }
}
