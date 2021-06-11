<div class="m-5">
    <form action="{{ asset('/admin/orders/' . $id . '/setCost') }}" method="post">
        @csrf
        <label for="order_date">{{__('Please enter the date')}}</label>
        <input type="text" placeholder="yyyy/mm/dd" name="date" id="order_date" class="form-control mb-3">
        <label for="order_cost">{{__('Please enter the Cost to Toman')}}</label>
        <input type="number" placeholder="100000" name="cost" id="order_cost" class="form-control mb-3" id="numberCost">
        <input type="submit" value="{{ __('Send') }}" class="btn btn-success">
    </form>
</div>