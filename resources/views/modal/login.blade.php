<div
    class="modal fade"
    id="loginModal"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="row mx-0">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="login_nickname" class="text-white font-16">
                                    <i class="fas fa-user"></i>
                                    Username
                                </label>
                                <input
                                    placeholder="Username"
                                    type="text"
                                    required
                                    name="nickname"
                                    class="form-control
                                    @if($errors->has('nickname') && session('modal') === 'login')
                                        is-invalid
                                    @endif"
                                    id="login_nickname"
                                    @if(session('modal') === 'login')
                                    value="{{ old('nickname') }}"
                                    @endif
                                >
                                @if($errors->has('nickname') && session('modal') === 'login')
                                    <small class="text-red">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="login_password" class="text-white font-16">
                                    <i class="fas fa-key"></i>
                                    Password
                                </label>
                                <input
                                    placeholder="Password"
                                    type="password"
                                    required
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="login_password"
                                >
                                @error('password')
                                <small class="text-red">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <input
                                type="submit"
                                name="login"
                                value="Log In"
                                class="activeBtn d-block w-100"
                            />
                        </div>
                    </div>
                    <div class="row mx-0 mt-2">
                        <div class="col-lg-6 col-md-6 col-sm-12 text-left text-sm-center text-white font-16">
                            <a
                                href="javascript:void(0);"
                                class="text-decoration-none text-white font-16"
                                id="go-to-register"
                            >
                                Registration
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-right text-sm-center text-white font-16">
                            <a
                                href="javascript:void(0);"
                                class="text-decoration-none text-white font-16"
                                id="go-to-forgot"
                            >
                                Forgot password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

