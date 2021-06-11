<x-layouts.admin-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-slot name="title">
        {{ $title ??  config('app.name', 'Laravel') . ' | ' . __('Dashboard') }}
    </x-slot>

    <x-admin-ticket-messages-component :ticket="$ticket"/>
</x-layouts.admin-layout>