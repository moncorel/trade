<div class="footer wow fadeInUp">
    <a href="/">
        <img
            @if(\App\Models\Setting::logotypeExists())
            src="storage/settings/logo.png"
            @else
            src="/images/logo.png"
            @endif
            class="logotype-image"
            alt="Logo"
        >
    </a>

    <div class="links">
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('terms-and-conditions') }}">Terms and conditions</a>
        <a href="{{ route('contact-us') }}">Contact us</a>
        <a href="#">Payment</a>
    </div>

    <span>{{ \App\Models\Setting::getAddress() }}</span>
    <span class="email">
        <a href="mailto:{{ \App\Models\Setting::getEmail() }}">
            {{ \App\Models\Setting::getEmail() }}
        </a>
    </span>
</div>
