@extends('adminlte::page')

@section('title', 'Create User')

@section('content_header')
@stop

@section('content')
    <div class="wrapper">
        <a href="{{ route('admin.users') }}" class="btn btn-success">
            <i class="fas fa-arrow-left"></i>
            Back
        </a>
        <h1 class="mt-2">Add user</h1>
        <hr>
        @include('includes.alerts')
        <form action="{{ route('admin.users.save') }}" method="POST">
            @csrf
            <h2>User Information</h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="nickname">Nickname</label>
                        <input
                            type="text"
                            id="nickname"
                            name="nickname"
                            class="form-control @error('nickname') is-invalid @enderror"
                            value="{{ old('nickname') }}"
                        >
                        @error('nickname')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                        >
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                        >
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="password_confirmation">
                            Password Confirmation
                        </label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                        >
                        @error('password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <h2>Wallets</h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="btc_amount">BTC amount</label>
                        <input
                            type="text"
                            id="btc_amount"
                            name="btc_amount"
                            class="form-control @error('btc_amount') is-invalid @enderror"
                            value="0"
                        >
                        @error('btc_amount')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="eth_amount">ETH amount</label>
                        <input
                            type="text"
                            id="eth_amount"
                            name="eth_amount"
                            class="form-control @error('eth_amount') is-invalid @enderror"
                            value="0"
                        >
                        @error('eth_amount')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="bch_amount">BCH amount</label>
                        <input
                            type="text"
                            id="bch_amount"
                            name="bch_amount"
                            class="form-control @error('bch_amount') is-invalid @enderror"
                            value="0"
                        >
                        @error('bch_amount')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <input
                        type="submit"
                        class="btn btn-primary d-block w-100"
                        value="Save User!"
                    >
                </div>
            </div>
        </form>

    </div>
@stop

@section('css')

@stop

@section('js')

@stop
