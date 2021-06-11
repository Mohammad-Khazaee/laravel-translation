<x-layouts.admin-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-slot name="title">
        {{ $title ??  config('app.name', 'Laravel') . ' | ' . __('Dashboard') }}
    </x-slot>

    @if (session('NewOrderResult'))
        <x-message :id="session('id')" />
    @endif 
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
        </div>
    @endif
    <livewire:admin-orders-table-livewire>
</x-layouts.admin-layout>