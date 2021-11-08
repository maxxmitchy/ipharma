<x-app-layout>
    @hasanyrole('subadmin|admin|Super Admin')
        <livewire:admin.dashboard/>
    @else
        <livewire:user.dashboard/>
    @endhasanyrole
</x-app-layout>
