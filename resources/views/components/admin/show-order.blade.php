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
                    <th scope="row">شماره کاربر و ایمل</th>
                    <td>{{':شماره کاربر' . $order->user->id . ' :ایمیل' . $order->user->email . ' نام: ' . $order->user->name }}</td>
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
                        @switch($order->status_id)
                            @case(3)
                                    @if (isset($order->translated_files) || !empty($order->translated_files))
                                    {{-- download --}}
                                    <form action="{{asset('orders/' . $order->id .'/download')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="file" value="{{ $order->translated_files }}" >
                                        <input type="submit" value="{{ __('Download') }}" class="btn btn-warning">
                                    </form>
                                    {{-- update and delete Previous files --}}
                                    <form action="{{ asset('admin/orders/' . $order->id .  '/edit') }}" method="get" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="files[]" value="{{ $order->translated_files }}" multiple>
                                        <input type="submit" value="{{ __('Update and delete previous files') }}"  class="btn btn-info">
                                    </form>
                                    @else
                                    {{-- send --}}
                                    <form action="{{ asset('admin/orders/' . $order->id .  '/edit') }}" method="get" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="files[]" value="{{ $order->translated_files }}" multiple>
                                        <input type="submit" value="{{ __('Send') }}" class="btn btn-info">
                                    </form>
                                    @endif
                                @break
                            @case(2)
                                    {{ __('Still didnt paid') }}
                                @break
                            @case(1)
                                    {{ __('Still didnt paid') }}
                                @break
                            @default
                                <form action="{{ asset('admin/orders/'. $order->id .'/download') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="file" value="{{ $order->translated_files }}">
                                    <input type="submit" value="{{__('Download')}}" class="btn btn-success">
                                </form>
                        @endswitch
                        </td>
                    </tr>
                <tr>
                    <th scope="row">وضعیت ترجمه</th>
                    <td>{{ $order->status->status }}</td>
                </tr>
                <tr>
                    <th scope="row">زمان تحویل سفارش</th>
                    <td>
                        @if(empty($order->date))
                            <form action="{{ asset('admin/orders/' . $order->id . '/setCost') }}" method="get">
                                <input type="submit" value="{{__('Set cost of order')}}" class="btn btn-info">
                            </form>
                        @else
                            {{ $order->date }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>قیمت مشخص شده</th>
                    <td>
                        @if(empty($order->cost))
                            <form action="{{ asset('admin/orders/' . $order->id . '/setCost') }}" method="get">
                                <input type="submit" value="{{__('Set cost of order')}}" class="btn btn-info">
                            </form>
                        @else
                            {{ $order->cost }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">سطح ترجمه</th>
                    <td>
                        @switch($order->orderDetails->translation_mode)
                            @case(1)
                                تخصصی
                                @break
                            @case(2)
                                متوسط
                                @break
                            @case(3)
                                اقتصادی
                                @break
                        @endswitch
                        {{ $order->orderDetails->source_language ?? '' }}
                    </td>
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
                    <th scope="row">پیام</th>
                    <td>{{ $order->orderDetails->message ?? '' }}</td>
                </tr>
                <tr>
                    <th scope="row">رد کردن</th>
                    <td>
                        @if ($order->status_id == 1)
                            <form action="{{ asset('admin/orders/' . $order->id . '/reject') }}">
                                <input type="submit" value="{{__('Reject')}}" class="btn btn-success">
                            </form>
                        @else
                            امکان رد کردن وجود ندارد
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">حذف کامل</th>
                    <td>
                        <form action="{{ asset('admin/orders/'. $order->id) }}" method="post">
                            @csrf
                            @method('delete');
                            <input type="submit" value="{{__('Delete')}}" class="btn btn-success">
                        </form>
                    </td>
                </tr>
                
            </tbody>
            </table>
        </div>
    </div>
</div>
