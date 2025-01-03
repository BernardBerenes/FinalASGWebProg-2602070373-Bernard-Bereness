<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="{{ route('homePage') }}">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 40px; width: 100px">
        </a>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('homePage') }}">@lang('lang.home')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center">
            <form class="d-flex me-2" role="search">
                <input class="form-control me-2" type="search" placeholder="@lang('lang.search_friend')" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">@lang('lang.search')</button>
            </form>
            <div class="dropdown me-3">
                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ app()->getLocale() == 'en' ? '🇺🇸 English' : '🇮🇩 Bahasa' }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                    @if(app()->getLocale() != 'en')
                        <li>
                            <a class="dropdown-item" href="{{ route('set-locale', 'en') }}">🇺🇸 English</a>
                        </li>
                    @endif
                    @if(app()->getLocale() != 'id')
                        <li>
                            <a class="dropdown-item" href="{{ route('set-locale', 'id') }}">🇮🇩 Bahasa</a>
                        </li>
                    @endif
                </ul>
            </div>
            @auth
            <div class="dropdown">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('assets/images/default-avatar.png') }}" alt="Profile" class="rounded-circle" style="height: 40px; width: 40px;">
                </a>
                <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="profileDropdown" style="width: 200px;">
                    <li><strong class="px-3 d-block text-truncate" style="max-width: 180px;">{{ Auth::user()->name }}</strong></li>
                    <li><a class="dropdown-item" href="">Profile</a></li>
                    <li><a class="dropdown-item" href="">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            
            @endauth
            @guest
                <div class="d-flex">
                    <a href="{{ route('loginPage') }}" class="btn btn-primary">@lang('lang.login')</a>
                </div>
            @endguest
        </div>
    </div>
</nav>
