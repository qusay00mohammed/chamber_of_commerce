<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\Setting;

class StripeService
{

    public function stripe($store)
    {
        $request = request();
        $numberamount = intval($request->amount);
        //  Start Stripe
        \Stripe\Stripe::setApiKey(Setting::where('key', 'secret-key-stripe')->first()->description ?? '');
        $session = \Stripe\Checkout\Session::create([
            'line_items' =>  [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => "Name: " . $store->name,
                    ],
                    'unit_amount' => $numberamount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success', ["id" => $store->id], true),
            'cancel_url' => route('cancel', ["id" => $store->id], true),
        ]);

        return redirect($session->url);
    }

    public function success($id)
    {
        $donate = Payment::findOrFail($id);
        $donate->update([
            'status' => "paid",
        ]);
        $donate->save();
        session()->flash('add');
        return redirect()->route('supportUs');
    }

    public function cancel($id)
    {
        $donate = Payment::findOrFail($id)->delete();
        return redirect()->route('supportUs')->withErrors(['errors' => "error"]);
    }

}



