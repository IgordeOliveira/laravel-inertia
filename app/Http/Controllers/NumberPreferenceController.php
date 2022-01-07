<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNumberPreferenceRequest;
use App\Http\Requests\UpdateNumberPreferenceRequest;
use App\Models\NumberPreference;

class NumberPreferenceController extends Controller
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
     * @param  \App\Http\Requests\StoreNumberPreferenceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNumberPreferenceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NumberPreference  $numberPreference
     * @return \Illuminate\Http\Response
     */
    public function show(NumberPreference $numberPreference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NumberPreference  $numberPreference
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberPreference $numberPreference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNumberPreferenceRequest  $request
     * @param  \App\Models\NumberPreference  $numberPreference
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNumberPreferenceRequest $request, NumberPreference $numberPreference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NumberPreference  $numberPreference
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberPreference $numberPreference)
    {
        //
    }
}
