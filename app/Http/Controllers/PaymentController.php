<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Http\Resources\Payment as ResourcesPayment;
use App\Http\Resources\PaymentCollection;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PaymentCollection
     */
    public function index()
    {
        //return new PaymentCollection(Payment::where('state', '!=', -1, 'and', 'user_id', '=', auth('api')->user()->id)->paginate(10));
        return new PaymentCollection(Payment::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PaymentRequest  $request
     * @return ResourcesPayment
     */
    public function store(PaymentRequest $request)
    {
        $payment = Payment::create([
            'amount' => $request->amount,
            'user_id' => $request->user_id,
            'payment_method_id' => $request->payment_id
        ]);

        return new ResourcesPayment($payment);
    }

    /**
     * Display the specified resource.
     *
     * @param  Payment  $id
     * @return PaymentCollection
     */
    public function show(Payment $payment)
    {
        return new PaymentCollection($payment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PaymentRequest  $request
     * @param  Payment  $id
     * @return PaymentCollection
     */
    public function update(PaymentRequest $request, Payment $payment)
    {
        $payment->update([
            'amount' => $request->amount,
            'user_id' => $request->user_id,
            'payment_method_id' => $request->payment_method_id,
            'state' => $request->state
        ]);

        return new PaymentCollection($payment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Payment  $payment
     * @return void
     */
    public function destroy(Payment $payment)
    {
        //$payment->update(['state' => -1]);
        $payment->delete();
    }
}
