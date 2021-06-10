@extends('personal.layouts.main')

@section('content')
    <div class="user-page">
        @include('includes.navbar')
        <div class="container">
            <div class="row mx-0">
                <div class="col-12 col-md-4 col-lg-3 col-xl-2 pt-0 pb-2 wow fadeInDown" data-wow-delay="0.4s">
                    @include('personal.includes.leftSidebar')
                </div>

                <div class="col-12 col-md-8 col-lg-9 col-xl-10 p-0">
                    <div class="row mx-0">
                        <div class="col-md-6 wow fadeInDown mb-4" data-wow-delay="0.2s">
                            <div class="col-12 bg-block p-4">
                                <p class="h5">Password</p>
                                @if(session('password_updated'))
                                    <p class="bg-success p-3 rounded text-light" id="upd_pass">
                                        {{ session('password_updated') }}
                                        <span onclick="closeUpdPass()"
                                              class="float-md-right text-dark font-weight-bold cursor-pointer">
                                    X
                                </span>
                                    </p>
                                @endif
                                <form action="{{ route('updatePassword') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="text-white font-16" for="previous_password">
                                            <i class="fas fa-lock-open"></i>
                                            Previous password
                                        </label>
                                        <input type="password"
                                               name="previous_password"
                                               id="previous_password"
                                               class="form-control @error('previous_password') is-invalid @enderror"
                                        >
                                        @error('previous_password')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="text-white font-16 mt-3" for="new_password">
                                            <i class="fas fa-unlock"></i>
                                            New password
                                        </label>
                                        <input type="password"
                                               name="new_password"
                                               id="new_password"
                                               class="form-control @error('new_password') is-invalid @enderror"
                                        >
                                        @error('new_password')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="text-white font-16 mt-3"
                                               for="new_password_confirmation">
                                            <i class="fas fa-lock"></i>
                                            Confirm password
                                        </label>
                                        <input
                                            type="password"
                                            name="new_password_confirmation"
                                            id="new_password_confirmation"
                                            class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                        >
                                        @error('new_password_confirmation')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <input
                                        type="submit"
                                        class="activeBtn d-block w-100 mt-4"
                                        value="Change"
                                    >
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeInDown">
                            <div class="col-12 bg-block p-4">
                                <p class="h5 font-weight-bold">
                                    Two factor authentification
                                </p>
                                @if(!Auth::user()->two_factor_active)
                                    <form
                                        action="{{ route('settings.auth.activate') }}"
                                        method="POST"
                                    >
                                @else
                                    <form
                                        action="{{ route('settings.auth.disable') }}"
                                        method="POST"
                                    >
                                @endif
                                    @csrf
                                    @method('PUT')
                                    @if(!Auth::user()->two_factor_active)
                                        <div class="form-group p-0">
                                            <select name="auth_method" class="form-select">
                                                <option value="telegram">Telegram</option>
                                            </select>
                                        </div>
                                        <input type="submit"
                                               class="activeBtn d-block w-100 mt-2"
                                               value="Enable"
                                        />
                                    @else
                                        <p class="text-white font-weight-bold font-16">
                                            2FA is enabled.<br>
                                            Method: {{ ucfirst(Auth::user()->two_factor_method) }}
                                        </p>
                                        <input type="submit"
                                               class="activeBtn disableBtn d-block w-100 mt-2"
                                               value="Disable"
                                        />
                                    @endif
                                </form>
                            </div>
                            <div class="col-12 bg-block p-4 mt-3">
                                <p class="h5 font-weight-bold">
                                    Promo code activation
                                </p>
                                <form
                                    action="{{ route('settings.promocode') }}"
                                    method="POST"
                                >
                                    @csrf

                                    <div class="form-group p-0">
                                        <label for="promo_code" class="text-white font-16">
                                            <i class="fas fa-promo"></i>
                                            Promo code
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="promo_code"
                                            id="promo_code"
                                        >
                                    </div>

                                    <input type="submit"
                                           class="activeBtn d-block w-100 mt-2"
                                           value="Activate"
                                    />
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-0">
                        <div class="col-md-6 wow fadeInDown">
                            <div class="col-12 bg-block p-4">
                                <p class="h5">User settings</p>
                                @if(session('settings_updated'))
                                    <p class="bg-success p-3 rounded text-light"
                                       id="information_updated"
                                    >
                                        {{ session('settings_updated') }}
                                        <span onclick="closeUpdName('information_updated')"
                                              class="float-md-right text-dark font-weight-bold cursor-pointer"
                                        >
                                    X
                                </span>
                                    </p>
                                @endif

                                <form
                                    action="{{ route('settings.update.information') }}"
                                    method="POST"
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <div class="">
                                        <span>
                                            <i class="fas fa-image"></i>
                                            Avatar
                                        </span>

                                            <div class="mt-2">
                                                <label for="avatar"
                                                       class="label-for-avatar text-white"
                                                >Upload avatar (max 1 mb)</label>
                                            </div>
                                        </div>
                                        <div class="settings-avatar-image pb-5">
                                            <img
                                                @if(\Illuminate\Support\Facades\Auth::user()->avatar)
                                                src='/storage/avatars/{{ \Illuminate\Support\Facades\Auth::user()->avatar }}'
                                                @else
                                                src='/images/user-icon.jpg'
                                                @endif
                                                alt="settings-image"
                                            >
                                        </div>
                                        <input type="file"
                                               name="avatar"
                                               id="avatar"
                                               class="d-none">
                                    </div>

                                    <div class="form-group p-0">
                                        <label for="nickname" class="text-white font-16 mt-3">
                                            <i class="fas fa-user"></i>
                                            Nickname
                                        </label>
                                        <input type="text" name="nickname" id="nickname"
                                               value="{{ Auth::user()->nickname }}"
                                               class="form-control @error('nickname') is-invalid @enderror">
                                        @error('nickname')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>

                                    <input type="submit"
                                           class="activeBtn d-block w-100 mt-4"
                                           value="Change"
                                    />
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
    </div>

    @include('modal.promocode-not-found')
    @include('modal.two-factor-code')
    @include('modal.two-factor-disable')
@endsection
