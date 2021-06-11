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
                    <th scope="row">(تومان) قیمت</th>
                    <td>{{ $order->cost ?? 'قیمت گذاری نشده' }}</td>
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
            </tbody>
            </table>
        </div>
    </div>
    <div>
        <form action="{{ asset('orders/'. $order->id .'/payment') }}" method="post">
            @csrf
            <input type="submit" value="{{ __('Pay') }}" class="btn btn-success">
        </form>
    </div>
</div>