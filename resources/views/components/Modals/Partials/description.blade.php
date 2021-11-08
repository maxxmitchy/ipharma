<div class="">
    <div class="pt-3 flex flex-col">
        <h2 class="font-bold text-xs tracking-wider">Name</h2>
        <p class="text-xs text-gray-700 font-semibold tracking-wider">
            {{$product->product_name}}
        </p>
    </div>

    <div class="pt-3 flex flex-col">
        <h2 class="mb-1 font-bold text-xs tracking-wider">Ingredients</h2>
        <x-Modals.Partials.ingredientTable :product="$product"/>
    </div>
    <div class="pt-3 flex flex-col">
        <h2 class="font-bold text-xs tracking-wider">Manufacture/Expiry</h2>
        <p class="text-xs text-gray-700 font-semibold tracking-wider">
            {{$product->manufacturing_date}} / {{$product->expiry_date}}
        </p>
    </div>
    <hr class="my-3">
    <div class="flex flex-col">
        <h2 class="font-bold text-xs tracking-wider">Package included:</h2>
        <p class="text-xs text-gray-700 font-semibold tracking-wider">
            One Gol #2aGol22 properly kept.
        </p>
    </div>
</div>
