@if ($errors->any())
    <div class="alert alert-danger m-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row justify-content-center my-5">
    <div class="col-md-12">
        <div class="card shadow bg-light">
            <form class="m-5" method="post" action="{{ asset('tickets') }}">
                
                @csrf
                <label for="subject">موضوع تیکت را بنویسید</label>
                <input type="text" class="form-control mb-2" name="subject" placeholder="موضوع" id="subject" required>
                <label for="message">توضیحات</label>
                <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="پیام ..." wire:model.10ms="message"></textarea>

                <input type="submit" value="ارسال" class="m-2 btn-success btn">
                </fieldset>
            </form>
        </div>
    </div>
</div>
