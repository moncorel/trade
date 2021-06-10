<div
    class="modal fade"
    id="twoFactorCodeModal"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title">Enable Telegram 2fa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                @if(session('modal') === 'two_factor')
                    <span class="d-block text-center">
                        <i class="fab fa-telegram-plane font-4-rem"></i>
                    </span>
                    <p class="text-center text-white font-weight-bold font-24">
                        Send to bot code - /activate {{ session('code') }}
                    </p>
                    <a href="https://t.me/trade_2fa_bot" class="text-center d-block">
                        https://t.me/trade_2fa_bot
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

