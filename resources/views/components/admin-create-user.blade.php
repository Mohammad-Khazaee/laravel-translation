<div class="row justify-content-center my-5">
    <div class="col-md-12">
        <div class="card shadow bg-light">
            <a href="{{ route('admin.users') }}" class="btn btn-info m-3">{{ __('go back') }}</a>
             @if (session('status'))
              <div class="alert alert-success m-1">
                  {{ session('status') }}
              </div>
          @endif
              <div class="m-1">
            <x-jet-validation-errors class="mb-4" />
                </div>
            <form method="POST" action="{{ route('admin.users.store') }}" dir="rtl" class="m-5">
                @csrf

                <div class="block">
                    <x-jet-label for="name" value="{{ __('ایمیل') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="block">
                    <x-jet-label for="email" value="{{ __('ایمیل') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('پسورد') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('تکرار پسورد') }}" />
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password"/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button>
                        {{ __('submit') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
</div>