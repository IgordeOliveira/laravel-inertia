<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNumberPreferenceRequest;
use App\Http\Requests\UpdateNumberPreferenceRequest;
use App\Models\NumberPreference;
use App\Models\Number;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class NumberPreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($numberId)
    {
        $number = Number::find($numberId);
        $preferences = $number->preferences;
        $customerName= $number->customer->name;

        return Inertia::render('Numbers/Preferences/List', ['number' => $number, 'preferences' => $preferences, 'customerName' => $customerName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($numberId)
    {
        $number = Number::find($numberId);
        $customerName = $number->customer->name;

        return Inertia::render('Numbers/Preferences/Create', ['number' => $number, 'customerName' => $customerName]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNumberPreferenceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNumberPreferenceRequest $request)
    {

        Log::debug('teste');
        Log::debug($request);
        // $preference = NumberPreference::create($request->validated());

        // Log::debug($preference);

        // dd($preference);
        // return redirect()->route('preferences.list', ['numberId' => $request->numberId,'msg' => 'Preference created']);
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
    public function destroy($preferenceId)
    {
        $numberPreference = NumberPreference::find($preferenceId);
        $numberId = $numberPreference->number->id;
        $numberPreference->delete();
        return redirect()->route('preferences.list',[$numberId]);
    }
}
