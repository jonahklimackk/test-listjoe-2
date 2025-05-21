<?php

namespace App\Http\Controllers;

use Log;
use Auth;
use App\User;
use App\Orders;
use App\Products;
use App\Helpers\Error;
use Illuminate\Http\Request;

class StripeHandlerController extends Controller
{

    /**
	* Process a successful payment by stripe checkout
	*
	* @return void
	*/
	public function success(Request $request)
	{
		$order = Orders::where('user_id', Auth::user()->id)->get()->first();

		if (isset($order) && $order->justHappened($order))
			echo "Looks like your order for blahhh was succesfull, pleasecheck blah you got upgraded";
		else
			echo "there was a problem with your order please contact support";

	}

    /**
	* Handle when a customer cancels order attempt
	*
	* @return void
	*/
	public function cancelled()
	{
		return 'Looks like you cancelled your order.';
	}



    /**
	* An Endpoint
	*
	* @return void
	*/
	public function endpoint()
	{
		$input = @file_get_contents('php://input');
		$event = json_decode($input);

		http_response_code(200); // PHP 5.4 or greater

		Log::info('webhook fired');
		Log::info($event->id);
		Log::info($event->data->object->client_reference_id);
		Log::info($event->data->object->id);
		// Log::info($event->data->object->billing_details['email']);
		// Log::info($event->data->object->billing_details['email']);
		// Log::info($event->data->object->paid);
		// Log::info($event->data->object->amount);
		// Log::info($event->data->source->status);


		if($event->type == "charge.succeeded")
		{
			// Orders::stripeHandler($event);
		}

		if($event->type == 'checkout.session.completed')
		{
			// Orders::stripeHandler($event);
			Log::info($event->data->object->client_reference_id);
			list($userId, $productSku) = explode("|", $event->data->object->client_reference_id);

			$user = User::where('id', $userId)->get()->first();
			if(!isset($user))
				Error::handle('could not find user during stripe transaction');

			$product = Products::where('sku', $productSku)->get()->first();
			if(!isset($product))
				Error::handle('could not find product during stripe transaction');

			$order = Orders::create([
				'processor' => 'stripe',
				'order_id' => $event->data->object->id,
				'user_id' => $user->id,
				'affiliate_id' => $user->sponsor_id,
				'product_id' => $product->id,
			]);


			//now actually process the order, upgrade, credits whatever
			$user->credits = $user->credits + $product->credits;
			$user->solo_tokens = $user->solo_tokens + $product->solo_tokens;
			if ($product->upgrade_to != 'none')
				$user->membership = $product->upgrade_to;
			$user->save();


			Log::info('session completed');

		}
	}



/*

{
  "created": 1326853478,
  "livemode": false,
  "id": "evt_00000000000000",
  "type": "charge.succeeded",
  "object": "event",
  "request": null,
  "pending_webhooks": 1,
  "api_version": "2019-05-16",
  "data": {
    "object": {
      "id": "ch_00000000000000",
      "object": "charge",
      "amount": 100,
      "amount_refunded": 0,
      "application": null,
      "application_fee": null,
      "application_fee_amount": null,
      "balance_transaction": "txn_00000000000000",
      "billing_details": {
        "address": {
          "city": null,
          "country": null,
          "line1": null,
          "line2": null,
          "postal_code": null,
          "state": null
        },
        "email": null,
        "name": "Jenny Rosen",
        "phone": null
      },
      "captured": false,
      "created": 1564716063,
      "currency": "cad",
      "customer": null,
      "description": "My First Test Charge (created for API docs)",
      "destination": null,
      "dispute": null,
      "failure_code": null,
      "failure_message": null,
      "fraud_details": {
      },
      "invoice": null,
      "livemode": false,
      "metadata": {
      },
      "on_behalf_of": null,
      "order": null,
      "outcome": null,
      "paid": true,
      "payment_intent": null,
      "payment_method": "card_00000000000000",
      "payment_method_details": {
        "card": {
          "brand": "visa",
          "checks": {
            "address_line1_check": null,
            "address_postal_code_check": null,
            "cvc_check": null
          },
          "country": "US",
          "exp_month": 8,
          "exp_year": 2020,
          "fingerprint": "qhmvRYVfjWg7gIew",
          "funding": "credit",
          "last4": "4242",
          "three_d_secure": null,
          "wallet": null
        },
        "type": "card"
      },
      "receipt_email": null,
      "receipt_number": null,
      "receipt_url": "https://pay.stripe.com/receipts/acct_1Ete9qKUIKdaxcGg/ch_1F2rKFKUIKdaxcGgmRvS12pe/rcpt_FXxEnzSQ5G7YyPCeJOXvj4yPHO64kCX",
      "refunded": false,
      "refunds": {
        "object": "list",
        "data": [
        ],
        "has_more": false,
        "total_count": 0,
        "url": "/v1/charges/ch_1F2rKFKUIKdaxcGgmRvS12pe/refunds"
      },
      "review": null,
      "shipping": null,
      "source": {
        "id": "card_00000000000000",
        "object": "card",
        "address_city": null,
        "address_country": null,
        "address_line1": null,
        "address_line1_check": null,
        "address_line2": null,
        "address_state": null,
        "address_zip": null,
        "address_zip_check": null,
        "brand": "Visa",
        "country": "US",
        "customer": null,
        "cvc_check": null,
        "dynamic_last4": null,
        "exp_month": 8,
        "exp_year": 2020,
        "fingerprint": "qhmvRYVfjWg7gIew",
        "funding": "credit",
        "last4": "4242",
        "metadata": {
        },


*/


    /**
	* An Endpoint
	*
	* @return void
	*/
	public function endpoint2()
	{

		$payload = @file_get_contents('php://input');
		$event = null;

		try {
			$event = \Stripe\Event::constructFrom(
				json_decode($payload, true)
			);
		} catch(\UnexpectedValueException $e) {
    		// Invalid payload
			http_response_code(400);
			exit();
		}

// Handle the event
		switch ($event->type) {
			case 'payment_intent.succeeded':
        $paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
        handlePaymentIntentSucceeded($paymentIntent);
        break;
        case 'payment_method.attached':
        $paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
        handlePaymentMethodAttached($paymentMethod);
        break;
    // ... handle other event types
        default:
        // Unexpected event type
        http_response_code(400);
        exit();
    }

    http_response_code(200);
}
}
