<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    //
    // use Braintree_Transaction;

    public function process(Request $request)
    {
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];

        $status = \Braintree_Transaction::sale([
    	'amount' => '10.00',
    	'paymentMethodNonce' => $nonce,
    	'options' => [
    	    'submitForSettlement' => True
    	]
        ]);

        return response()->json($status);
    }
}
