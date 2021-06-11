<div class="row justify-content-center my-5">
    <div class="col-md-12">
        <div class="card shadow bg-light">

            @if ($errors->any())
                <div class="alert alert-danger m-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="m-5" wire:submit.prevent="save">
                <fieldset>
                <legend class="mb-4">سفارش جدید</legend>
                @csrf

                <div
                    x-data="{ isUploading: false, progress: 0 }"
                    x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                    <!-- File Input -->
                <label for="inputGroupFile02">فایل های خود را در این قسمت اپلود کنید</label>
                <input type="file" name="files[]" class="form-control" id="inputGroupFile02" multiple wire:model.10ms="files" required>
                    <div wire:loading wire:target="files">
                        <div class="d-flex justify-content-center m-3">
                            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <!-- Progress Bar -->
                    <div x-show="isUploading" class="progress">
                        <progress max="100" x-bind:value="progress" class="progress-bar w-100 mt-2"></progress>
                    </div>
                </div>
            
                <label for="title">موضوع ترجمه خود را بنویسید</label>
                <input type="text" wire:model.10ms="title" class="form-control mb-2" name="title" placeholder="موضوع" id="title" required>
                <div class="row">
                    <div class="col-md-6">
                        <label for="type">نوع ترجمه</label>
                        <select class="form-control" id="type" wire:model.10ms="translation_mode">
                            <option value="3">سطح پایین</option>
                            <option value="2" selected>متوسط</option>
                            <option value="1">تخصصی</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="type">زمان مورد انتظار خود برای ترجمه ی مطلبتان را وارد کنید</label>
                        <input type="text" placeholder="1400/12/12 مثال..." class="persianDate form-control" wire:model.10ms="Expected_date" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="type">زبان مبدا</label>
                        <select class="form-control" id="type" wire:model.10ms="source_language">
                            <option value="English" selected>انگلیسی</option>
                            <option value="Persian">فارسی</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="type">زبان مقصد</label>
                        <select class="form-control" id="type" wire:model.10ms="destination_language">
                            <option value="English">انگلیسی</option>
                            <option value="Persian" selected>فارسی</option>
                        </select>
                    </div>
                </div>
                <label for="message">اگر پیامی دارید میتوانید برای ترجمه ی این فایل بفرستید</label>
                <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="پیام ..." wire:model.10ms="message"></textarea>
                <div wire:loading wire:target="save">
                    <div class="d-flex justify-content-center m-3">
                        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                <input type="submit" value="ارسال" class="m-2 btn-success btn">
                </fieldset>
            </form>
        </div>
    </div>
</div>
