<?php

namespace App\Providers;

use Livewire\Component;
use App\Spotlight\MyOrders;
use Illuminate\Support\Arr;
use MailchimpMarketing\ApiClient;
use App\Services\MailChimpNewsletter;
use App\Services\NewsletterInterface;
use App\Services\PaymentGateWayInterface;
use App\Services\PaystackPayment;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(NewsletterInterface::class, function()
        {
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us20',
            ]);

            return new MailChimpNewsletter($client);
        });

        app()->bind(PaymentGateWayInterface::class, function()
        {
            return new PaystackPayment;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // notify

        Component::macro('notify', function($message){
            $this->dispatchBrowserEvent('notify', $message);
        });

        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(
                        str_contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            [$relationName, $relationAttribute] = explode('.', $attribute);

                            $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                            });
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });

            return $this;
        });

        // cvs
        Builder::macro('toCsv', function() {
            $results = $this->get();

            if($results->count() < 1) return;
            $titles = implode(',', array_keys((array) $results->first()->getAttributes()));

            $values = $results->map(function ($result) {
                return implode(',', collect($result->getAttributes())->map(function ($thing){
                    return '"'.$thing.'"';
                })->toArray());
            });

            $values->prepend($titles);

            return $values->implode("\n");
        });
    }
}
