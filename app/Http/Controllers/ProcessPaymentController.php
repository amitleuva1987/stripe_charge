<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcessPaymentController extends Controller
{
    public function process_payment(Request $request,  $price)
    {
        $user = Auth::user();
        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);

        try {
            $user->charge($price * 100, $paymentMethod, ['off_session' => true]);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error .... ' . $e->getMessage()]);
        }
        return redirect('home');
    }
}
