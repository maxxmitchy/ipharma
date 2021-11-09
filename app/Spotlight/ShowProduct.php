<?php

namespace App\Spotlight;

use App\Models\Product;
use LivewireUI\Spotlight\Spotlight;
use LivewireUI\Spotlight\SpotlightCommand;
use LivewireUI\Spotlight\SpotlightSearchResult;
use LivewireUI\Spotlight\SpotlightCommandDependency;
use LivewireUI\Spotlight\SpotlightCommandDependencies;

class ShowProduct extends SpotlightCommand
{
    /**
     * This is the name of the command that will be shown in the Spotlight component.
     */
    protected string $name = 'Show Product';

    /**
     * This is the description of your command which will be shown besides the command name.
     */
    protected string $description = 'show product information';

    /**
     * You can define any number of additional search terms (also known as synonyms)
     * to be used when searching for this command.
     */
    protected array $synonyms = [];

    /**
     * Defining dependencies is optional. If you don't have any dependencies you can remove this method.
     * Dependencies are asked from your user in the order you add the dependencies.
     */
    public function dependencies(): ?SpotlightCommandDependencies
    {
        return SpotlightCommandDependencies::collection()
            ->add(
                // register a 'product' dependency
                SpotlightCommandDependency::make('product')
                // The default Spotlight placeholder will be changed to your dependency place holder
                ->setPlaceholder('Enter product name.')
            );
    }

    /**
     * Spotlight will resolve dependencies by calling the search method followed by your dependency name.
     * The method will receive the search query as the parameter.
     */
    public function searchProduct($query)
    {
        return Product::where('product_name', 'like', "%$query%")
            ->get()
            ->map(function(Product $product) {
                // You must map your search result into SpotlightSearchResult objects
                return new SpotlightSearchResult(
                    $product->id,
                    $product->product_name,
                    sprintf('Show details for %s', $product->product_name)
                );
            });
    }

    /**
     * When all dependencies have been resolved the execute method is called.
     * You can type-hint all resolved dependency you defined earlier.
     */
    public function execute(Spotlight $spotlight, Product $product)
    {
        $spotlight->emit('openModal', 'modal.show-product', ['product' => $product->id]);
    }

    /**
     * You can provide any custom logic you want to determine whether the
     * command will be shown in the Spotlight component. If you don't have any
     * logic you can remove this method. You can type-hint any dependencies you
     * need and they will be resolved from the container.
     */
    public function shouldBeShown(): bool
    {
        return true;
    }
}
