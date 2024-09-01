<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return Payment::with('patient')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string',
        ]);

        $payment = Payment::create($request->all());

        return response()->json($payment, 201);
    }

    public function show(Payment $payment)
    {
        return $payment->load('patient');
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'patient_id' => 'sometimes|exists:users,id',
            'amount' => 'sometimes|numeric',
            'payment_date' => 'sometimes|date',
            'payment_method' => 'sometimes|string',
        ]);

        $payment->update($request->all());

        return response()->json($payment);
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return response()->json(null, 204);
    }
}
