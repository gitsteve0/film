<nav class="navbar navbar-expand-md navbar-dark {{ route('home') ? 'fixed-top' : '' }} bg-primary bg-opacity-10" aria-label="navbar">
    <div class="container-xl">

        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('img/logo2.png') }}" style="width: 7%"> @lang('app.app-name')</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbars">
            <ul class="navbar-nav ms-auto">
                @auth('customer_web')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                            <i class="bi-box-arrow-right"></i> {{ auth('customer_web')->user()['name'] }}
                        </a>
                    </li>
                    <form id="logoutForm" action="{{ route('logout') }}" method="post" class="d-none">
                        @csrf
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link link-light fs-5" href="#">
                            <i class="bi-box-arrow-in-right"></i> @lang('app.login')
                        </a>
                    </li>
                @endauth
                @if(app()->getLocale() == 'tm')
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('language', 'tm') }}">
                            <img src="{{ asset('img/flag/tkm.png') }}" alt="Türkmen" style="height:1rem;">
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('language', 'en') }}">
                            <img src="{{ asset('img/flag/eng.png') }}" alt="English" style="height:1rem;">
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>