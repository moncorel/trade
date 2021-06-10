<div
    class="modal fade"
    id="twoFactorDisableModal"
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
                @if(session('two_factor_disable_success'))
                    <p class="bg-success p-2 rounded text-white font-weight-bold">
                        2FA successfully disabled!
                    </p>
                @else
                    <form action="{{ route('settings.auth.disable.request') }}" method="POST">
                        @csrf
                        <div class="row mx-0">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="disable_code" class="text-white font-16">
                                        <i class="fas fa-envelope"></i>
                                        Code
                                    </label>
                                    <input
                                        placeholder="Code"
                                        type="text"
                                        required
                                        name="code"
                                        class="form-control
                                    @if($errors->has('code') && session('modal') === 'forgot')
                                            is-invalid
@endif"
                                        id="disable_code"
                                    >
                                    @if($errors->has('code') && session('modal') === 'forgot')
                                        <small class="text-red">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <input
                                    type="submit"
                                    value="Disable"
                                    class="activeBtn d-block w-100"
                                />
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>

