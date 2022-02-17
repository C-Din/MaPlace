<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentMethodRequest;
use App\Http\Resources\PaymentMethod as ResourcesPaymentMethod;
use App\Http\Resources\PaymentMethodCollection;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return new PaymentMethodCollection(PaymentMethod::where('state', '!=', -1)->paginate(10));
        return new PaymentMethodCollection(PaymentMethod::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PaymentMethodRequest  $request
     * @return ResourcesPaymentMethod
     */
    public function store(PaymentMethodRequest $request)
    {
        $paymentMethod = PaymentMethod::create([  'name' => $request->name]);
        return new ResourcesPaymentMethod($paymentMethod);
    }

    /**
     * Display the specified resource.
     *
     * @param  PaymentMethod  $paymentMethod
     * @return ResourcesPaymentMethod
     */
    public function show(PaymentMethod $paymentMethod)
    {
        return new ResourcesPaymentMethod($paymentMethod);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PaymentMethodRequest  $request
     * @param  PaymentMethod  $paymentMethod
     * @return ResourcesPaymentMethod
     */
    public function update(PaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        $paymentMethod->update([
            'name' => $request->name,
            'state' => $request->state
        ]);
        return new ResourcesPaymentMethod($paymentMethod);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PaymentMethod  $paymentMethod
     * @return void
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        //$paymentMethod->update(['state' => -1]);
        $paymentMethod->delete();
    }
}
