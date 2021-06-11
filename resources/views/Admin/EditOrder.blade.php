<x-layouts.admin-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-slot name="title">
        {{ $title ??  config('app.name', 'Laravel') . ' | ' . __('Dashboard') }}
    </x-slot>

    <livewire:send-translated-files-livewire :orderId="$orderId" />
</x-layouts.admin-layout>