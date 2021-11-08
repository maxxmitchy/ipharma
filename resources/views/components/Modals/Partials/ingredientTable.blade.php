<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="border px-2 py-1 text-left text-xs font-medium text-gray-500 tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="border px-2 py-1 text-left text-xs font-medium text-gray-500 tracking-wider">
                                Qty
                            </th>
                            <th scope="col" class="border px-2 py-1 text-left text-xs font-medium text-gray-500 tracking-wider">
                                More info
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($product->ingredients as $ingredient )
                            <tr>
                                <td class="border px-2 py-1">
                                    <p class="text-xs font-medium tracking-wider text-gray-900">
                                        {{$ingredient->name}}
                                    </p>
                                </td>
                                <td class="border text-xs px-2 py-1">
                                    {{$ingredient->strength}}mcg
                                </td>
                                <td class="border px-2 py-1">
                                    <p class="text-xs font-medium tracking-wider">{{Illuminate\Support\Str::of($ingredient->description)->limit(60)}}</p>
                                </td>
                            </tr>
                        @empty
                            <div class="cols-5 text-xs tracking-wider my-2">No ingredients yet</div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
