<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Payment;
class StripePaymentController extends Controller
{
    //
     /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       $payment_info =    Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
       
       $payment = new Payment;
       $payment->transection_id= $payment_info['balance_transaction'];
       $payment->payment_method  =$payment_info['payment_method'];
       $payment->description = $payment_info['description'];
       $payment->payment_status =$payment_info['status'];
       $payment->stripe_id =$payment_info['id'];
       $payment->save();
     
  
        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}
