<?php

namespace App\Listeners;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Events\CreateProduct;
use Illuminate\Support\Facades\App;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCreateProductNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreateProduct  $event
     * @return void
     */
    public function handle(CreateProduct $event)
    {
        $product = Product::create([
            'product_name' => $event->product->product_name,
            'brand_id' => $event->product->brand_id,
            'category_id' => $event->product->category_id,
            'section_id' => $event->product->section_id,
            'manufacturing_date' => $event->product->manufacturing_date ?? now(),
            'expiry_date' => $event->product->expiry_date ?? now(),
            'product_description' => $event->product->product_description,
            'meta_title' => $event->product->meta_title,
            'meta_description' => $event->product->meta_description,
            'meta_keywords' => $event->product->meta_keywords,
        ]);

        $product->productattribute()->create(session()->get('attributes'));

        foreach (session()->get('ingredients[]') ?? [] as $ingredient) {
            $product->ingredients()->create([
                'name' => $ingredient['name'],
                'strength' => $ingredient['strength']
            ]);
        }

        if(App::environment('local')){

            $product->addMedia($event->product->allfiles['main_image']['path'])->toMediaCollection('main');

            $event->product->allfiles->filter(function ($value, $key) {
                return Str::contains($key, 'sub_image');
            })->each(fn($image) =>
                $product->addMedia($image['path'])->toMediaCollection('subImages')
            );
        }
    }
}
