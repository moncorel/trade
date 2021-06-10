<div
    class="modal fade"
    id="forgotModal"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title">Restore password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                @if(session('forgot_success'))
                    <p class="bg-success p-2 rounded text-white font-weight-bold">
                        Restore link was sent into your Email address!
                    </p>
                @else
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="row mx-0">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="login_nickname" class="text-white font-16">
                                        <i class="fas fa-envelope"></i>
                                        E-mail
                                    </label>
                                    <input
                                        placeholder="E-mail"
                                        type="email"
                                        required
                                        name="email"
                                        class="form-control
                                    @if($errors->has('email') && session('modal') === 'forgot')
                                            is-invalid
@endif"
                                        id="email"
                                        @if(session('modal') === 'forgot')
                                        value="{{ old('email') }}"
                                        @endif
                                    >
                                    @if($errors->has('email') && session('modal') === 'forgot')
                                        <small class="text-red">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <input
                                    type="submit"
                                    name="login"
                                    value="Send Reset Link"
                                    class="activeBtn d-block w-100"
                                />
                            </div>
                        </div>
                    </form>
                    <div class="row mx-0 mt-2">
                        <div class="col-lg-6 col-md-6 col-sm-12 text-left text-sm-center text-white font-16">
                            <a
                                href="javascript:void(0);"
                                class="text-decoration-none text-white font-16"
                                id="go-to-register-1"
                            >
                                Registration
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-right text-sm-center text-white font-16">
                            <a
                                href="javascript:void(0);"
                                class="text-decoration-none text-white font-16"
                                id="go-to-login-1"
                            >
                                Log In
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

