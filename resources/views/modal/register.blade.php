<div
    class="modal fade"
    id="registerModal"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered max-width-800" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title">Sign Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row mx-0">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="nickname" class="text-white font-16">
                                    <i class="fas fa-user"></i>
                                    Username
                                </label>
                                <input
                                    placeholder="Username"
                                    type="text"
                                    required
                                    name="nickname"
                                    class="form-control
                                    @if($errors->has('nickname') && session('modal') === 'register')
                                        is-invalid
                                    @endif"
                                    @if(session('modal') === 'register')
                                    value="{{ old('nickname') }}"
                                    @endif
                                    id="nickname"
                                >
                                @if($errors->has('nickname') && session('modal') === 'register')
                                    <small class="text-red">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email" class="text-white font-16">
                                    <i class="fas fa-envelope"></i>
                                    Email
                                </label>
                                <input
                                    placeholder="Email"
                                    type="email"
                                    required
                                    name="email"
                                    class="form-control
                                    @if($errors->has('email') && session('modal') === 'register')
                                        is-invalid
                                    @endif"
                                    @if(session('modal') === 'register')
                                    value="{{ old('email') }}"
                                    @endif
                                    id="email"
                                >
                                @if($errors->has('email') && session('modal') === 'register')
                                    <small class="text-red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password" class="text-white font-16">
                                    <i class="fas fa-key"></i>
                                    Password
                                </label>
                                <input
                                    placeholder="Password"
                                    type="password"
                                    required
                                    name="password"
                                    class="form-control
                                    @if($errors->has('password') && session('modal') === 'register')
                                        is-invalid
                                    @endif"
                                    id="password"
                                >
                                @if($errors->has('password') && session('modal') === 'register')
                                    <small class="text-red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password_confirmation" class="text-white font-16">
                                    <i class="fas fa-key"></i>
                                    Confirm password
                                </label>
                                <input
                                    placeholder="Confirm password"
                                    type="password"
                                    required
                                    name="password_confirmation"
                                    class="form-control
                                    @if($errors->has('password') && session('modal') === 'register')
                                        is-invalid
                                    @endif"
                                    id="password_confirmation"
                                >
                                @if($errors->has('password') && session('modal') === 'register')
                                    <small class="text-red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                            <div class="ml-4">
                                <input type="checkbox"
                                       class="form-check-input @error('agreement') is-invalid @enderror"
                                       id="agree"
                                       name="agreement"
                                >
                                <label class="form-check-label" for="agree">
                                    <span class="text-white">I read and accept </span>
                                    <a href="{{ route('terms-and-conditions') }}" target="_blank" class="link">
                                        User Agreement
                                    </a>
                                </label>
                                <br>
                                @error('agreement')
                                <small class="text-red">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>

                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                            <input
                                type="submit"
                                name="login"
                                value="Sign Up"
                                class="activeBtn d-block w-100"
                            />
                        </div>
                    </div>
                    <div class="row mx-0 mt-2">
                        <div class="col-12 text-center">
                            <a
                                href="javascript:void(0);"
                                id="go-to-login"
                                class="text-decoration-none text-white font-16"
                            >
                                Already registered?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


