<div class="row justify-content-center my-5">
    <div class="col-md-12">
        <div class="card shadow bg-light">
           
            <a href="{{ route('order.create') }}" class="btn btn-success m-3">{{ __('New order') }}</a>
                
            <table class="table" wire:init="loadOrders">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">شماره سفارش</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">قیمت</th>
                    <th scope="col">زمان ترجمه فایل</th>
                    <th scope="col">اصلاعات کامل</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                    
                    <tr>
                        <th>{{ $order->id }}</th>
                        <td scope="row">
                            <span class="badge badge-primary">{{ $order->status->status }}</span>  
                        </td>
                        <td> {{ $order->cost ?? 'هنوز برسی نشده' }} </td>
                        <td> {{ $order->date ?? 'هنوز برسی نشده' }} </td>
                        <td>
                            <a href="{{ asset('admin/orders/' .  $order->id ) }}" class="btn btn-info"> دیدن اصلاعات کامل </a>
                        </td>
                    </tr>
                    @empty
                        <div class="alert alert-danger m-3" role="alert">
                        نتایجی پیدا نشد
                    </div>
                    @endforelse 
                        
                    
                </tbody>
            </table>
            <div wire:loading>
                <div class="d-flex justify-content-center m-3">
                    <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <button wire:click="addMore" class="btn btn-info m-3">{{ __('Add more result') }}</button>
    </div>
</div>