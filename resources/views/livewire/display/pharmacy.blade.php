<div class="">
    <x-Navigation.Guest.Header.header-one/>
    <div class="space-y-3 px-3 mt-5">
        <h1 class="text-2xl tracking-wider font-bold text-primary">Where you get your routine medications matter.</h1>

        <h3 class="text-sm tracking-wider text-gray-500">The best place for filling out your prescription is at iPharma. It is best to fill all prescriptions with the same pharmacy. That way, the pharmacy has a record of all the medicines you are taking. iPharma provides convinience, confidentaility, amongst other benefits, from the comfort of your home. Read through the steps below to see other additional benefits we provide.
        </h3>
        <br>
        <div class="wrapper space-x-3">
            <div class="item-cat rounded-md bg-gray-100 w-full h-24"></div>
            <div class="item-cat rounded-md bg-gray-100 w-full h-24"></div>
            <div class="item-cat rounded-md bg-gray-100 w-full h-24"></div>
        </div>
        <br>
        <div class="shadow-lg w-full flex justify-between items-center space-x-2 rounded-md bg-gray-100 py-2 px-4">
            <p class="tracking-wider text-gray-800 text-sm font-bold span-1">Upload your prescriptions and get a response immediately.</p>
            <label class="bg-gray-600 p-3 flex flex-col items-center rounded-md cursor-pointer">
                <x-Icons.upload class="h-4 w-4 text-white" />
                <input id="files" wire:model.defer="image" type="file" class="hidden bg-white text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2" />
            </label>
        </div>
        <div class="pt-0.5"></div>
        <h3 class="text-lg tracking-wider mb-2 font-bold">How we help?</h3>

        <div class="sm:grid sm:grid-cols-2 gap-6 space-y-10">
            <div class="flex flex-col space-y-1">
                <h5 class="tracking-wider font-bold text-sm">&rarr; Savings reviews </h5>
                <p class="ml-5 tracking-wider text-gray-500 text-sm">
                    Our pharmacists can help you save money on your medication purchases. Click the link below to find out more.
                </p>
                <a href="" class="ml-5 text-primary text-sm font-semibold underline rounded-md">See more</a>
            </div>
            <div class="flex flex-col space-y-1">
                <h5 class="tracking-wider font-bold text-sm">&rarr; Free drug deliveries</h5>
                <p class="ml-5 tracking-wider text-gray-500 text-sm">
                    Get your prescriptions delivered the most convinient way. Click the link below to find out more.
                </p>
                <a href="" class="ml-5 text-primary text-sm font-semibold underline rounded-md">See more</a>
            </div>
            <div class="flex flex-col space-y-1">
                <h5 class="tracking-wider font-bold text-sm">&rarr; Presorted drug scheduling packs</h5>
                <p class="ml-5 tracking-wider text-gray-500 text-sm">
                    Enjoy the ease of having your medications sorted by dose, indications and contra-indications by top professionals. Click the link below to find out more.
                </p>
                <a href="" class="ml-5 text-primary text-sm font-semibold underline rounded-md">See more</a>
            </div>
        </div>
    </div>
</div>
