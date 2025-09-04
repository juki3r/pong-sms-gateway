<div class=""> 
    <!-- Sidebar / Navbar -->
    <nav class=" flex align-items-center  h-100 d-none d-lg-flex px-3 shadow">
        <a href="{{ route('dashboard') }}" >
            <img src="{{asset('logo.png')}}" alt="" style="width:100px;">
        </a>
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="mx-3">
            {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-link :href="route('send_sms')" :active="request()->routeIs('send_sms')" class="mx-3 ">
            {{ __('Send SMS') }}
        </x-nav-link>
        <x-nav-link :href="route('credits')" :active="request()->routeIs('credits')" class="mx-3 ">
            {{ __('Credits') }}
        </x-nav-link>
    </nav>

    <!-- MOBILE/TABLET NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary d-lg-none w-100 border-b shadow">
        <div class="container-fluid px-2">
            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="d-flex justify-content-center align-items-center">
                <img src="{{ asset('logo.png') }}" alt="logo" width="200px">
                <span class="mx-2 title_logo">PONG SMS Services</span>
            </a>

            <!-- Custom Toggler -->
            <button class="navbar-toggler custom-toggler collapsed p-3" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mobileNavbar"
                    aria-controls="mobileNavbar"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <div class="toggler-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>

            <!-- Collapsible Menu -->
            <div class="collapse navbar-collapse text-end" id="mobileNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="my-3 me-5" id="mobile_nav">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link :href="route('send_sms')" :active="request()->routeIs('send_sms')" class="my-3 me-5" id="mobile_nav">
                            {{ __('Send SMS') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link :href="route('credits')" :active="request()->routeIs('credits')" class="my-3 me-5" id="mobile_nav">
                            {{ __('Credits') }}
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>