<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Passenger\StorePassengerRequest;
use App\Http\Requests\V1\Passenger\UpdatePassengerRequest;
use App\Models\Passenger;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\V1\Passenger\StorePassengerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePassengerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function show(Passenger $passenger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function edit(Passenger $passenger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\V1\Passenger\UpdatePassengerRequest  $request
     * @param  \App\Models\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePassengerRequest $request, Passenger $passenger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Passenger $passenger)
    {
        //
    }
}
