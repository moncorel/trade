@include('includes.header')


<div class="wrapper">
    @include('includes.navbar')
    <div class="container">
        <div class="row justify-content-center mx-0">
            <div class="col-md-8">
                <div class="bg-block mt-4 p-4">
                    <div class="text-center">
                        <h3 class="text-light">Reset Password</h3>
                    </div>
                    <div class="">
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="">
                                <div class="form-group">
                                    <label for="email" class="text-white">
                                        <i class="fas fa-envelope"></i>
                                        E-Mail Address
                                    </label>
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email"
                                        value="{{ $email ?? old('email') }}"
                                        required
                                        autocomplete="email"
                                        autofocus>

                                    @error('email')
                                    <small style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-white">
                                        <i class="fas fa-key"></i>
                                        Password
                                    </label>
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password"
                                        required
                                        autocomplete="password"
                                        autofocus
                                    >
                                    @error('password')
                                    <small style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation" class="text-white">
                                        <i class="fas fa-key"></i>
                                        Confirm password
                                    </label>
                                    <input
                                        id="password_confirmation"
                                        type="password"
                                        class="form-control"
                                        name="password_confirmation"
                                        required
                                    >
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <input
                                    type="submit"
                                    name="login"
                                    value="Reset Password"
                                    class="activeBtn"
                                />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-bg">
        @include('includes.footer')
    </div>
</div>



{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('password.update') }}">--}}
{{--                        @csrf--}}

{{--                        <input type="hidden" name="token" value="{{ $token }}">--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Reset Password') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
