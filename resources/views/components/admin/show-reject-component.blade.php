<div>
    <form action="{{ asset('admin/orders/'.$id.'/reject') }}" method="post" class="m-5">
        @csrf
        <label for="message">{{ __('What is your reasons for rejecting this order ? we will send it to customer') }}</label>
        <textarea name="message" id="message" cols="30" rows="10" class="form-control mb-3"></textarea>
        <input type="submit" value="{{__('Send')}}" class="btn btn-success">
    </form>
</div>