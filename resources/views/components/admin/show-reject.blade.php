<div>
    <form action="{{ asset('admin/orders/'.$order_id.'/reject') }}" method="post">
        @csrf
        <label for="message">{{ __('What is your reasons for rejecting this order ? we will send it to customer') }}</label>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
    </form>
</div>