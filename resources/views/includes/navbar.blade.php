<header
    style="z-index: 999"
    class="wow slideInDown navbar navbar-expand-lg wrapper main-navigation
    <?php
        $path = \Illuminate\Support\Facades\Request::path();
        if (strpos($path, 'about') !== false || strpos($path, 'personal') !== false || strpos($path, 'contact-us') !== false) {
            echo "z-index-99 position-relative bg-transparent w-100";
        }
        ?>"
    id="main-nav-header"
>
    <div class="container">
        <div class="row mx-0 align-items-center justify-content-around">
            <div class="col-lg-4 col-4 nav-left-part" style="margin: -16px 0">
                <a class="text-decoration-none" href="/">
                    <img
                        @if(\App\Models\Setting::logotypeExists())
                        src="storage/settings/logo.png"
                        @else
                        src="/images/logo.png"
                        @endif
                        class="logotype-image"
                        alt="Logo"
                    >
                    <span class="text-uppercase">{{ env('APP_NAME') }}</span>
                </a>
            </div>

            <div class="col nav-right-part text-right row align-items-center justify-content-end">
                <ul class="navbar-nav ml-auto custom-navbar">
                    @guest
                        <li class="mr-3">
                            <a
                                href="{{ route('about') }}"
                                class="nav-link @if(Route::currentRouteName() === 'about') active-link @endif"
                            >
                                About us
                            </a>
                        </li>
                        <li class="mr-3">
                            <a
                                href="{{ route('terms-and-conditions') }}"
                                class="nav-link @if(Route::currentRouteName() === 'terms-and-conditions') active-link @endif"
                            >
                                Terms and conditions
                            </a>
                        </li>
                        <li class="mr-3">
                            <a
                                href="javascript:void(0);"
                                data-toggle="modal" data-target="#registerModal"
                                class="nav-link"
                            >
                                Sign up
                            </a>
                        </li>
                        <li>
                            <a
                                href="javascript:void(0);"
                                data-toggle="modal" data-target="#loginModal"
                                class="nav-link"
                            >
                                Log in
                            </a>
                        </li>
                    @else
                        <li class="mr-3">
                            <a
                                href="/"
                                class="nav-link @if(Route::currentRouteName() === 'main') active-link @endif"
                            >
                                Home
                            </a>
                        </li>
                        <li class="mr-3">
                            <a
                                href="{{ route('personal') }}"
                                class="nav-link @if(Route::currentRouteName() === 'personal') active-link @endif"
                            >
                                Personal Area
                            </a>
                        </li>
                        <li class="mr-3">
                            <a
                                href="{{ route('trading') }}"
                                class="nav-link @if(Request::path() === 'trading') active-link @endif"
                            >
                                Trading
                            </a>
                        </li>
                        <li class="mr-3">
                            <a
                                href="{{ route('support') }}"
                                class="nav-link @if(Request::path() === 'personal/support') active-link @endif"
                            >
                                Support
                            </a>
                        </li>
                        <li class="mr-3">
                            <a
                                class="nav-link text-white personal-nav-link"
                                id="personal-dropdown-btn"
                                style="padding: 0.75rem 1rem"
                            >
                                <i class="user-pic">
                                    <img
                                        @if(\Illuminate\Support\Facades\Auth::user()->avatar)
                                        src='/storage/avatars/{{ \Illuminate\Support\Facades\Auth::user()->avatar }}'
                                        @else
                                        src='/images/user-icon.jpg'
                                        @endif
                                        alt="user-icon"
                                        class="square-image-24"
                                    >
                                </i>
                                <span>{{ Auth::user()->nickname }}</span>
                                <i class="fas fa-angle-down"></i>
                            </a>
                            <nav class="personal-dropdown" id="personal-mobile-menu">
                                <ul>
                                    <li>
                                        <a href="{{ route('personal') }}" class="active-link">
                                            <i class="fas fa-user"></i>
                                            Personal Area
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('settings') }}" class="active-link">
                                            <i class="fas fa-cog"></i>
                                            Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('logout') }}"
                                            class="active-link"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                        >
                                            <i class="fas fa-sign-out-alt"></i>
                                            Log Out
                                        </a>
                                        <form
                                            id="logout-form"
                                            class="d-none"
                                            action="{{ route('logout') }}"
                                            method="POST">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </nav>
                        </li>
                    @endguest
                </ul>


                <div class="mobile-nav">
                    @guest
                    <a
                        href="javascript:void(0);"
                        data-toggle="modal" data-target="#loginModal"
                        class="activeBtn"
                    >
                        Log In
                    </a>
                    @else
                    <div class="personal-nav">
                        <a
                            class="text-white"
                            id="personal-dropdown-btn-1"
                            style="padding: 0.75rem 1rem"
                        >
                            <i class="user-pic">
                                <img
                                    @if(\Illuminate\Support\Facades\Auth::user()->avatar)
                                    src='/storage/avatars/{{ \Illuminate\Support\Facades\Auth::user()->avatar }}'
                                    @else
                                    src='/images/user-icon.jpg'
                                    @endif
                                    alt="user-icon"
                                    class="square-image-24"
                                >
                            </i>
                            <span>{{ Auth::user()->nickname }}</span>
                            <i class="fas fa-angle-down"></i>
                        </a>
                        <nav class="personal-dropdown" id="personal-mobile-menu-1">
                            <ul>
                                <li>
                                    <a href="{{ route('personal') }}" class="active-link">
                                        <i class="fas fa-user"></i>
                                        Personal Area
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('settings') }}" class="active-link">
                                        <i class="fas fa-cog"></i>
                                        Settings
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('logout') }}"
                                        class="active-link"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                    >
                                        <i class="fas fa-sign-out-alt"></i>
                                        Log Out
                                    </a>
                                    <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    @endguest
                    <a
                        id="mobile-menu-btn"
                        class="none-active activeBtn mobile-menu-toggle ml-sm-1"
                    >
                        <i class="fas fa-bars"></i>
                    </a>
                    <nav class="navbox mobileShow" id="mobileMenu">
                        <ul>
                            @guest
                                <li>
                                    <a href="{{ route('about') }}">About us</a>
                                </li>
                                <li>
                                    <a href="{{ route('terms-and-conditions') }}">Terms and conditions</a>
                                </li>
                                <li>
                                    <a
                                        href="javascript:void(0);"
                                        data-toggle="modal" data-target="#registerModal"
                                    >
                                        Sign up
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="/" class="active-link">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('personal') }}" class="active-link">
                                        Personal
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('trading') }}" class="active-link">
                                        Trading
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('support') }}" class="active-link">
                                        Support
                                    </a>
                                </li>
                            @endguest
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

@guest
@include('modal.login')
@include('modal.register')
@include('modal.forgot')
@endguest

<script>
    window.onscroll = function() {
        const navbar = document.getElementById("main-nav-header");

        if (window.pageYOffset >= 1) {
            navbar.classList.add("sticky");
            navbar.classList.remove("bg-transparent");
            navbar.classList.remove("position-relative");
        } else {
            navbar.classList.add("bg-transparent");
            navbar.classList.add("position-relative");
            navbar.classList.remove("sticky");
        }
    };
</script>

<script>
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobileMenu');

    const personalMobileBtn = document.getElementById('personal-dropdown-btn');
    const personalMobileBtn1 = document.getElementById('personal-dropdown-btn-1');
    const personalMobileMenu = document.getElementById('personal-mobile-menu');
    const personalMobileMenu1 = document.getElementById('personal-mobile-menu-1');

    if (personalMobileBtn) {
        personalMobileBtn.addEventListener('click', function (event) {
            event.stopPropagation();
            if (personalMobileMenu.style.display === 'block') {
                personalMobileMenu.style.display = 'none';
                personalMobileBtn.classList.remove('active-btn-shadow');
                personalMobileBtn.classList.remove('personal-dropdown-active');
            } else {
                personalMobileMenu.style.display = 'block';
                personalMobileBtn.classList.add('active-btn-shadow');
                personalMobileBtn.classList.add('personal-dropdown-active');
            }
        });
    }

    if (personalMobileBtn1) {
        personalMobileBtn1.addEventListener('click', function (event) {
            event.stopPropagation();
            if (personalMobileMenu1.style.display === 'block') {
                personalMobileMenu1.style.display = 'none';
                personalMobileBtn1.classList.remove('active-btn-shadow');
                personalMobileBtn1.classList.remove('personal-dropdown-active');
            } else {
                personalMobileMenu1.style.display = 'block';
                personalMobileBtn1.classList.add('active-btn-shadow');
                personalMobileBtn1.classList.add('personal-dropdown-active');
            }
        })
    }

    mobileMenuBtn.addEventListener('click', function (event) {
        event.stopPropagation();
        if (mobileMenu.style.display === 'block') {
            mobileMenu.style.display = 'none';
            mobileMenuBtn.classList.remove('active-btn-shadow');
        } else {
            mobileMenu.style.display = 'block';
            mobileMenuBtn.classList.add('active-btn-shadow');
        }
    });

    window.addEventListener('click', function () {
        if (mobileMenu) {
            mobileMenu.style.display = 'none';
            mobileMenuBtn.classList.remove('active-btn-shadow');
        }

        if (personalMobileMenu) {
            personalMobileMenu.style.display = 'none';
            personalMobileBtn.classList.remove('active-btn-shadow');
            personalMobileBtn.classList.remove('personal-dropdown-active');
        }

        if (personalMobileMenu1) {
            personalMobileMenu1.style.display = 'none';
            personalMobileBtn1.classList.remove('active-btn-shadow');
            personalMobileBtn.classList.remove('personal-dropdown-active');
        }
    });
</script>

{{--<script>--}}
{{--    window.onload = () => {--}}
{{--        console.log(898989);--}}
{{--        @if(session('modal') === 'login')--}}
{{--        window.$('#loginModal').modal('show');--}}
{{--        @elseif(session('modal') === 'register')--}}
{{--        window.$('#registerModal').modal('show');--}}
{{--        @elseif(session('modal') === 'forgot')--}}
{{--        window.$('#forgotModal').modal('show');--}}
{{--        @endif--}}
{{--        document.getElementById('go-to-login').addEventListener('click', function() {--}}
{{--            window.$('#registerModal').modal('hide');--}}
{{--            window.$('#loginModal').modal('show');--}}
{{--            window.$('#forgotModal').modal('hide');--}}
{{--        });--}}
{{--        document.getElementById('go-to-login-1').addEventListener('click', function() {--}}
{{--            window.$('#registerModal').modal('hide');--}}
{{--            window.$('#loginModal').modal('show');--}}
{{--            window.$('#forgotModal').modal('hide');--}}
{{--        });--}}
{{--        document.getElementById('go-to-register').addEventListener('click', function() {--}}
{{--            window.$('#loginModal').modal('hide');--}}
{{--            window.$('#registerModal').modal('show');--}}
{{--            window.$('#forgotModal').modal('hide');--}}
{{--        });--}}
{{--        document.getElementById('go-to-register-1').addEventListener('click', function() {--}}
{{--            window.$('#loginModal').modal('hide');--}}
{{--            window.$('#registerModal').modal('show');--}}
{{--            window.$('#forgotModal').modal('hide');--}}
{{--        });--}}
{{--        document.getElementById('go-to-forgot').addEventListener('click', function() {--}}
{{--            window.$('#loginModal').modal('hide');--}}
{{--            window.$('#registerModal').modal('hide');--}}
{{--            window.$('#forgotModal').modal('show');--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}
