<div>
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">خوش آمدید</h5>
        <p class="card-text">شما میتوانید منو را از بالا سمت راست کلیک کنید و سفارش خود را پیگیری یا یک سفارش جدید انتخواب کنید</p>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">سفارش جدید</h5>
        <p class="card-text">برای اینکه یک سفارش جدید را آغاز کنید میتوانید از منو سفارش جدید را کلیک کنید یا دکمه ی زیر را بزنید تا مستقیم به درخواست سفارش جدید بروید</p>
        <a href="{{ asset('orders/create') }}" class="btn btn-primary">سفارش جدید</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">پیگیری سفارشات</h5>
        <p class="card-text">برای پیگیری سفارشات میتواند در منو قسمت سفارش ها را کلیک کنید یا دیکمه زیر را بزنید تا مستقیم به سفارش ها بروید</p>
        <a href="{{ asset('orders') }}" class="btn btn-primary">سفارش ها</a>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">تیکت جدید</h5>
        <p class="card-text">برای تیکت جدید در منو میتوانید گزینه ی تیکت جدید را بزنید یا دکمه ی زیر را فشار دهید</p>
        <a href="{{ asset('tickets/create') }}" class="btn btn-primary">تیکت جدید</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">تیکت ها</h5>
        <p class="card-text">برای پیگیری تیکت ها میتوانید در قسمت منو از تیکت ها انتخواب کنید یااز دکمه زیر مستقیم به تیکت ها بروید </p>
        <a href="{{ asset('tickets') }}" class="btn btn-primary">تیکت ها</a>
      </div>
    </div>
  </div>
</div>