<header class="navbar navbar-dark sticky-top bg-danger flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5" href="{{ route('admin.dashboard') }}">@lang('app.app-name')</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav flex-row me-auto me-md-0">
        <div class="nav-item">
            <a class="nav-link px-3 fs-4" href="{{ route('home') }}" target="_blank">
                <i class="bi-house-door-fill text-white"></i>
            </a>
        </div>
        <div class="nav-item text-nowrap mt-1">
            <a class="nav-link px-3 fs-5 text-white" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                <i class="bi-box-arrow-left"></i> @lang('app.logout')
            </a>
        </div>
    </div>
    <form id="logoutForm" action="{{ route('admin.logout') }}" method="post" class="d-none">
        @csrf
        @honeypot
    </form>
</header>