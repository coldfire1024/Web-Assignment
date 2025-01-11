<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function showCheckoutForm()
{
    return view('checkout'); // Adjust to your checkout Blade file
}


public function processPayment(Request $request)
{
    $request->validate([
        'card-name' => 'required',
        'card-number' => 'required',
        'card-CVC' => 'required',
        'card-expiry-month' => 'required',
        'card-nexpiry-year' => 'required',
        'country' => 'required',
        'city' => 'required',
        'address' => 'required',
        'postal-code' => 'required',
    ]);

    Stripe::setApiKey(config('services.stripe_secret'));

    try {
        $charge = Charge::create([
            'amount' => 1000, // Amount in cents (e.g., $10.00)
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'Payment description',
            'receipt_email' => $request->email,
        ]);

        // Save transaction details to the database
        return redirect()->route('checkout.success')->with('success', 'Payment successful!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => $e->getMessage()]);
    }
}

}
