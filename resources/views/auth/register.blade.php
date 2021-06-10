@include('includes.header')
@include('includes.navbar')

<div class="" style="background: #00062b;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="about mt-4">
                    <div class="text-center">
                        <h3 class="text-light">{{ __('Register') }}</h3>
                    </div>

                    <div class="">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="first_name" class="col-form-label">{{ __('First Name') }}</label>

                                            <div class="">
                                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                                @error('first_name')
                                                    <small style="color: red;">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="second_name" class="col-form-label">{{ __('Second Name') }}</label>

                                            <div class="">
                                                <input id="second_name" type="text" class="form-control @error('second_name') is-invalid @enderror" name="second_name" value="{{ old('second_name') }}" required autocomplete="second_name" autofocus>

                                                @error('second_name')
                                                <small style="color: red;">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="nickname" class="col-form-label">{{ __('Nickname') }}</label>

                                            <div class="">
                                                <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname" autofocus>

                                                @error('nickname')
                                                <small style="color: red;">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="email" class="col-form-label">{{ __('E-mail') }}</label>

                                            <div class="">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                <small style="color: red;">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="password" class="col-form-label">{{ __('Password') }}</label>

                                            <div class="">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" autofocus>

                                                @error('password')
                                                <small style="color: red;">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="password_confirmation" class="col-form-label">{{ __('Confirm Password') }}</label>

                                            <div class="">
                                                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation" autofocus>

                                                @error('password_confirmation')
                                                <small style="color: red;">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group text-center mt-0">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input @error('agreement') is-invalid @enderror" id="agree" name="agreement">
                                    <label class="form-check-label" for="agree">
                                        I read and accept <a href="/terms" target="_blank" class="link">User Agreement</a>
                                    </label><br>
                                    @error('agreement')
                                    <small style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                                <input type="submit" name="register" value="Register" class="login_btn activeBtn mt-2" style="width: 100px;"/>
                                <div class="already">
                                    <a href="/login" class="link already">Already have an account?</a>
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
