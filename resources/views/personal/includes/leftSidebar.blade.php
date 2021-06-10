<div class="left-user-menu">
    <ul class="page-set">
        <li class="@if(Request::path() === 'personal') active @endif">
            <a href="{{ route('personal') }}">
                <i class="fas fa-wallet" style=""></i>
                Dashboard
            </a>
        </li>
        @if(Auth::user()->isAdmin())
            <li class="">
                <a href="{{ route('admin.home') }}">
                    <i class="fas fa-question"></i>
                    Admin Panel
                </a>
            </li>
        @elseif(Auth::user()->isUser())
            <li class="@if(Request::path() === 'personal/deposit') active @endif">
                <a href="{{ route('deposit') }}/">
                    <i class="fas fa-donate"></i>
                    Deposit
                </a>
            </li>
            <li class="@if(Request::path() === 'personal/withdraw') active @endif">
                <a href="{{ route('withdraw') }}">
                    <i class="fas fa-level-up-alt"></i>
                    Withdraw
                </a>
            </li>
            <li class="@if(Request::path() === 'personal/transfer') active @endif">
                <a href="{{ route('transfer') }}">
                    <i class="fas fa-random"></i>
                    Transfer
                </a>
            </li>
            <li class="@if(Request::path() === 'personal/secured-deal') active @endif">
                <a href="{{ route('secured-deal') }}">
                    <i class="fas fa-shield-alt"></i>
                    Secured Deal
                </a>
            </li>
            <li class="@if(Request::path() === 'personal/history') active @endif">
                <a href="{{ route('history') }}">
                    <i class="fas fa-history"></i>
                    History
                </a>
            </li>
        @endif

        <li class="@if(Request::path() === 'personal/settings') active @endif">
            <a href="{{ route('settings') }}">
                <i class="fas fa-cog"></i>
                Settings
            </a>
        </li>
    </ul>
</div>
