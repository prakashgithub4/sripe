# sripe
# create strip account by the following url 
https://stripe.com/
add stripe published key and secret key into your env file like this

STRIPE_KEY=pk_test_51H0u4LKJ4fYprBgNfE38iNJUlxp8vaDzHnRqUPMpFNuoi8t2VaNFvzRPu5mZtN4UF5ELfFoueJEk93f417lzf9D0006HIObrkB

STRIPE_SECRET=sk_test_51H0u4LKJ4fYprBgNuxO4sIGdVJvtO7lkbCwr2SOhn2wz9jHMph1CJmDqlhbgth0nI7xP4c6AiKi3jDIG8m6VTNXZ00RJtZkJ5r

# install stripe package
composer require stripe/stripe-php

intall stripe packages by this command 
# usage 
<p>use Stripe;</p><br/>
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
