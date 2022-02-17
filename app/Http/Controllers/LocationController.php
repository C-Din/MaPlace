<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Http\Resources\Location as ResourcesLocation;
use App\Http\Resources\LocationCollection;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return LocationCollection
     */
    public function index()
    {
        //return new LocationCollection(Location::where('state', '!=', -1)->paginate(10));
        return new LocationCollection(Location::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LocationRequest  $request
     * @return ResourcesLocation
     */
    public function store(LocationRequest $request)
    {
        $location = Location::create([
            'name' => $request->name,
            'number_of_seats' => $request->number_of_seats
        ]);

        return new ResourcesLocation($location);
    }

    /**
     * Display the specified resource.
     *
     * @param  Location  $event
     * @return ResourcesLocation
     */
    public function show(Location $location)
    {
        return new ResourcesLocation($location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LocationRequest  $request
     * @param  Location  $location
     * @return ResourcesLocation
     */
    public function update(Request $request, Location $location)
    {
        $location->update([
            'name' => $request->name,
            'number_of_seats' => $request->number_of_seats,
            'state' => $request->state
        ]);

        return new ResourcesLocation($location);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Loaction  $location
     * @return void
     */
    public function destroy(Location $location)
    {
        //$location->update(['state' => -1]);
        $location->delete();
    }
}
