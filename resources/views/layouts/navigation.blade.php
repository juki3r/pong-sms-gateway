<div class=""> 
    <!-- Sidebar / Navbar -->
    <nav class=" bg-black text-light  flex-column align-items-center  h-100 d-none d-lg-flex px-3">
        <a href="{{ route('dashboard') }}" >
            <img src="{{asset('logo.png')}}" alt="" style="width:120px;">
        </a>

        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="my-2 text-light mt-5">
            {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-link :href="route('send_sms')" :active="request()->routeIs('send_sms')" class="my-2 text-light">
            {{ __('Send SMS') }}
        </x-nav-link>
        <x-nav-link :href="route('credits')" :active="request()->routeIs('credits')" class="my-2 text-light">
            {{ __('Credits') }}
        </x-nav-link>
    </nav>
    <nav class="navbar navbar-expand-lg bg-body-tertiary d-block d-lg-none">
        <div class="container-fluid">
            <a href="{{ route('dashboard') }}" >
                <img src="{{asset('logo.png')}}" alt="logo" class="">
            </a>
            <button class="navbar-toggler custom-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <div class="toggler-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>

              
          <div class="collapse navbar-collapse text-center" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-dark text-center">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="my-2">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('send_sms')" :active="request()->routeIs('send_sms')" class="my-2">
                    {{ __('Send SMS') }}
                </x-nav-link>
                <x-nav-link :href="route('credits')" :active="request()->routeIs('credits')" class="my-2">
                    {{ __('Credits') }}
                </x-nav-link>
            </ul>

          </div>
        </div>
      </nav>
    </div>