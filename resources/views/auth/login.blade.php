@include('includes.header')
@include('includes.navbar')

<div class="" style="background: #00062b;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="about mt-4">
                    <div class="text-center">
                        <h3 class="text-light">{{ __('Login') }}</h3>
                    </div>

                    <div class="">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="">
                                <div class="form-group row text-center">
                                    <label for="email" class="col-md-4 col-form-label">
                                        <i class="fas fa-envelope"></i>
                                        {{ __('E-Mail Address') }}
                                    </label>

                                    <div class="">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                                        @error('email')
                                        <small style="color: red;">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row text-center">
                                    <label for="password" class="col-md-4 col-form-label">
                                        <i class="fas fa-user"></i>
                                        {{ __('Password') }}
                                    </label>

                                    <div class="">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" autofocus>

                                        @error('password')
                                        <small style="color: red;">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-check text-center">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-light" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <input type="submit" name="login" value="Log In" class="login_btn activeBtn" style="width: 100px;"/>
                                <div class="choices">
                                    <a href="/register" class="link alr">{{ __('Registration') }}</a>
                                    @if (Route::has('password.request'))
                                        <a class="link forgot" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bottom-bg">
    @include('includes.footer')
</div>
