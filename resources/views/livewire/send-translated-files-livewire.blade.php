<div>
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form wire:submit.prevent="save" class="form-grop m-5">
        <input class="form-control" type="hidden" wire:model="orderId" value="{{ $orderId }}">
        <label for="files">فایل های ترجمه شده را در اینجا ارسال کنید</label>
        <input class="form-control mb-5" id="files" type="file" wire:model="files" multiple>
        <div wire:loading>
            <div class="spinner-border" role="status"></div>
        </div>
        <input class="btn btn-success" type="submit" value="{{ __('Send') }}">
    </form>
</div>
