<div
    class="modal fade"
    id="twoFactorConfirmModal"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <p class="bg-success p-2 rounded text-white">
                    2FA code was sent to your Telegram account.
                </p>
                <form action="{{ route('auth.two-factor.confirm') }}" method="POST">
                    @csrf
                    <div class="row mx-0">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="nickname"
                                    value="{{ session('nickname') }}"
                                >
                                <input type="hidden" name="password"
                                       value="{{ session('password') }}"
                                >
                                <label for="confirm_code" class="text-white font-16">
                                    <i class="fas fa-envelope"></i>
                                    Code
                                </label>
                                <input
                                    placeholder="Code"
                                    type="text"
                                    required
                                    name="confirm_code"
                                    class="form-control
                                @if($errors->has('confirm_code') && session('modal') === 'two_factor_confirm')
                                        is-invalid
@endif"
                                    id="confirm_code"
                                >
                                @if($errors->has('confirm_code') && session('modal') === 'two_factor_confirm')
                                    <small class="text-red">
                                        <strong>{{ $errors->first('confirm_code') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <input
                                type="submit"
                                value="Confirm"
                                class="activeBtn d-block w-100"
                            />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

