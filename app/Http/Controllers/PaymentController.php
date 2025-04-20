<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\CreditTransactions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    
    public function buyCredits(Request $request)
    {
        $credits = (int) $request->credits;

        if (!in_array($credits, [500, 1000, 3000])) {
            return back()->with('error', 'Invalid credit package selected.');
        }
    
        $prices = [
            500 => 120000,
            1000 => 250000,
            3000 => 500000,
        ];
    
        $amount = $prices[$credits];
    
        $paymentLink = $this->createPaymentLink($amount);
        Auth::user()->increment('sms_credits', $credits);

        // if (isset($paymentLink['data']['attributes']['checkout_url'])) {
        //     return redirect()->away($paymentLink['data']['attributes']['checkout_url']);
        //     CreditTransactions::create([
        //         'user_id' => auth()->id(),
        //         'amount' => $credits,
        //         'paymongo_link_id' => $paymentLink['data']['id'],
        //         'status' => 'pending',
        //     ]);

        //     // Add credits for now, use webhooks if paymonggo account is approved.

        // }
    
        return back()->with('error', 'Failed to create payment link.');
    }

    private function createPaymentLink($amount, $description = 'Buy credits')
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'authorization' => 'Basic ' . base64_encode(env('PAYMONGO_SECRET_KEY') . ':'),
            'content-type' => 'application/json',
        ])->post('https://api.paymongo.com/v1/links', [
            'data' => [
                'attributes' => [
                    'amount' => $amount,
                    'description' => $description,
                    'remarks' => 'SMS Credits',
                    'redirect' => [
                        'success' => route('payment.success'),
                        'failed' => route('payment.failed'),
                    ]
                ]
            ]
        ]);

        return $response->json();
    }


    public function paymentSuccess()
    {
        return redirect('dashboard')->with('message', 'Payment Success... Credits will reflect shortly.');
    }
    public function failed()
    {
        return redirect('dashboard')->with('message', 'Payment failed');
    }


    public function handleWebhook(Request $request)
    {
        $payload = $request->all();

        // Ensure the event is a successful payment
        if (
            isset($payload['data']['attributes']['type']) &&
            $payload['data']['attributes']['type'] === 'payment.paid'
        ) {
            $payment = $payload['data']['attributes']['data']['attributes'] ?? null;

            if ($payment && isset($payment['payment_intent_id'])) {
                // Get payment intent details from PayMongo
                $intentId = $payment['payment_intent_id'];

                $response = Http::withBasicAuth(config('services.paymongo.secret'), '')
                    ->get("https://api.paymongo.com/v1/payment_intents/{$intentId}");

                $intentData = $response['data']['attributes'] ?? null;

                if ($intentData && isset($intentData['metadata']['user_id'], $intentData['metadata']['credits'])) {
                    $userId = $intentData['metadata']['user_id'];
                    $credits = $intentData['metadata']['credits'];

                    $user = User::find($userId);

                    if ($user) {
                        $user->sms_credits += $credits;
                        $user->save();
                    }
                }
            }
        }

        return response()->json(['status' => 'received']);
    }

}

