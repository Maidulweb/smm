<header class="sticky-top">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="nav_logo">
                    <img src="landing_asset/images/logo.png" class="img-fluid" alt="Logo">
                </div>
            </a>
            <button class="navbar-toggler navbar__btn" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <iconify-icon icon="iconamoon:menu-burger-horizontal-fill"></iconify-icon>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 nav__bar__links">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page"
                           href="{{route('user.home')}}" >
                            Dashboard
                        </a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page"
                           href="{{route('services')}}" >
                            Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page"
                           href="#api" >
                            API
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page"
                           href="{{ route('terms') }}" >
                            Terms
                        </a>
                    </li>
                  @guest
                    <li class="nav-item">
                        <a class="nav-link  active " aria-current="page"
                           href="{{ route('login') }}" >
                            Sign in
                        </a>
                    </li>
                    <li class="nav-item signup__btn">
                        <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                    </li>
                    @else
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span>@lang('Logout')</span></a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>