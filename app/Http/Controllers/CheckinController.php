<?php

namespace App\Http\Controllers;

use App\Models\checkin;
use App\Http\Requests\StorecheckinRequest;
use App\Http\Requests\UpdatecheckinRequest;

class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecheckinRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(checkin $checkin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(checkin $checkin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecheckinRequest $request, checkin $checkin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(checkin $checkin)
    {
        //
    }
}
