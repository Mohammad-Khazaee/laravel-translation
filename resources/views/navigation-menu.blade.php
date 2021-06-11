<header class="c-header c-header-light c-header-fixed c-header-with-subheader" >
    <button
        class="c-header-toggler c-class-toggler d-lg-none mfe-auto"
        type="button"
        data-target="#sidebar"
        data-class="c-sidebar-show"
    >
        <i class="fas fa-bars"></i>
    </button>
    <button
        class="c-header-toggler c-class-toggler mfs-3 d-md-down-none"
        type="button"
        data-target="#sidebar"
        data-class="c-sidebar-lg-show"
        responsive="true"
    >
        <i class="fas fa-bars"></i>
    </button>
    <ul class="c-header-nav d-md-down-none">
        <li class="c-header-nav-item px-3">
            <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
            </x-jet-nav-link>
        </li>
    </ul>
    <ul class="c-header-nav mr-auto ml-4">
        <li class="c-header-nav-item dropdown">
        @auth
            <x-jet-dropdown id="settingsDropdown">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    @else
                        {{ Auth::user()->name }}

                        <svg class="ml-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->
                    <h6 class="dropdown-header small text-muted">
                        {{ __('Manage Account') }}
                    </h6>

                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                        <i class="far fa-user m-2"></i>
                        {{ __('Profile') }}
                    </x-jet-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-jet-dropdown-link>
                    @endif

                    <hr class="dropdown-divider">

                    <!-- Authentication -->
                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt m-2"></i>
                        {{ __('Log out') }}
                    </x-jet-dropdown-link>
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </x-slot>
            </x-jet-dropdown>
        @endauth
        </li>
    </ul>
</header>