<?php

namespace App\Services;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class PaystackPayment implements PaymentGateWayInterface {

    /**
     *  Response from requests made to Paystack
     * @var mixed
     */
    protected $response;

    public function makePaymentRequest($data = null)
    {
        $body = [
            "amount" => filter_var($data->subtotal, FILTER_SANITIZE_NUMBER_INT),
            "email" => auth()->user()->email,
            "first_name" => Str::before($data->address->name, ' '),
            "last_name" => Str::after($data->address->name, ' '),
            "callback_url" => env('CALLBACK_URL'),
            "currency" => "NGN",
            // 'metadata' => ''
        ];

        $this->initialize($body);
    }

    private function initialize($body = [])
    {
        $this->response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.paystack.key'),
        ])->acceptJson()->post(config('services.paystack.paymentUrl'), $body);

        return $this;
    }

    public function getAuthorizationUrl($data)
    {
        $this->makePaymentRequest($data);

        $this->url = json_decode($this->response->body())->data->authorization_url;

        return redirect($this->url);
    }

    /**
     * Get the whole response from a get operation
     * @return array
     */
}
