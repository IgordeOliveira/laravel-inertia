<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNumberRequest;
use App\Http\Requests\UpdateNumberRequest;
use App\Models\Number;
use App\Models\Customer;
use App\Models\NumberPreference;
use Inertia\Inertia;

class NumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($customerId)
    {
        $customer = Customer::find($customerId);
        $numbers = $customer->numbers;

        return Inertia::render('Numbers/List', ['numbers' => $numbers, 'customer' => $customer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($customerId)
    {
        $customer = Customer::find($customerId);

        return Inertia::render('Numbers/Create', ['customer' => $customer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNumberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNumberRequest $request)
    {
        $customerId = $request->customerId;
        $number = Number::create(array_merge($request->validated(), [
            'customer_id' => $customerId
        ]));


        NumberPreference::insert([
            [
                'number_id' => $number->id,
                'name' => 'auto_attendant',
                'value' => '1',
            ],
            [
                'number_id' => $number->id,
                'name' => 'voicemail_enabled',
                'value' => '1',
            ]
        ]);




        return redirect()->route('numbers.list', ['customerId' => $customerId, 'msg' => 'Number created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function show(Number $number)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function edit(Number $number)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNumberRequest  $request
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNumberRequest $request, Number $number)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function destroy($numberId)
    {
        $number = Number::find($numberId);
        $customerId = $number->customer->id;


        // foreach ($number->preferences() as $preference){
        //     $preference->delete();
        // };
        $number->delete();
        return redirect()->route('numbers.list',[$customerId]);
    }
}
