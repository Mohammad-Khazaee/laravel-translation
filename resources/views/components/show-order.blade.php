<div class="row justify-content-center my-5">
    <div class="col-md-12">
        <div class="card shadow bg-light">

            <table class="table">
            <tbody>

                <tr>
                    <th scope="row">شماره سفارش</th>
                    <td>{{ $order->id }}</td>
                </tr>
                <tr>
                    <th scope="row">موضوع</th>
                    <td>{{ $order->orderDetails->title }}</td>
                </tr>
                <tr>
                    <th scope="row">فایل های فرستاده شده</th>
                    <td>
                        <form action="{{asset('orders/' . $order->id .'/download')}}" method="post">
                            @csrf
                            <input type="hidden" name="file" value="{{ $order->files }}" >
                            <input type="submit" value="{{ __('Download') }}" class="btn btn-warning">
                        </form>
                    </td>
                </tr>
                <tr>
                    <th scope="row">فایل های ترجمه شده</th>
                    <td>
                        @if (isset($order->translated_files) || !empty($order->translated_files))    
                            <form action="{{asset('orders/' . $order->id .'/download')}}" method="post">
                                @csrf
                                <input type="hidden" name="file" value="{{ $order->translated_files }}" >
                                <input type="submit" value="{{ __('Download') }}" class="btn btn-warning">
                            </form>
                        @else
                            ترجمه نشده
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">(تومان) قیمت</th>
                    <td>{{ $order->cost ?? 'قیمت گذاری نشده' }}</td>
                </tr>
                <tr>
                    <th scope="row">وضعیت</th>
                    <td>{{ $order->status->status }}</td>
                </tr>
                <tr>
                    <th scope="row">زمان تحویل سفارش</th>
                    <td>{{ $order->date ?? 'در حال برسی' }}</td>
                </tr>
                <tr>
                    <th scope="row">زبان مبدا</th>
                    <td>{{ $order->orderDetails->source_language ?? '' }}</td>
                </tr>
                <tr>
                    <th scope="row">زبان مقصد</th>
                    <td>{{ $order->orderDetails->destination_language ?? '' }}</td>
                </tr>
                <tr>
                    <th scope="row">پیام شما</th>
                    <td>{{ $order->orderDetails->message ?? '' }}</td>
                </tr>
                <tr>
                    <th scope="row">پرداخت</th>
                    <td>
                    @switch($order->status_id)
                        @case(1)
                            درحال برسی
                            @break
                        @case(2)
                            <form action="{{ asset('/orders/' .  $order->id  . '/payment') }}" method="get">
                                <input type="submit" value="{{ __('Pay') }}" class="btn btn-success">
                            </form>
                            @break
                        @default
                            پرداخت شده
                    @endswitch
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>
