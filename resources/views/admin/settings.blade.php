@extends('adminlte::page')

@section('title', 'Settings | Common')

@section('content_header')

@stop

@section('content')
    <div class="wrapper">
        <h2>Common</h2>
        <hr>
        @include('includes.alerts')
        <form
                action="{{ route('admin.settings.common.update') }}"
                enctype="multipart/form-data"
                method="POST"
            >
                @csrf
                <div class="row">
                    <div class="col-md-4 col-lg-3 col-sm-12">
                        <div class="form-group">
                            <label class="form-label" for="logotype">
                                Logotype
                            </label>
                            <br>
                            <input type="file" class="rounded" id="logotype" name="logotype"/>
                            <br>
                            @error('logotype')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-lg-2 col-sm-6">
                        <div class="form-group">
                            <label for="min_deposit_amount">Minimum Deposit Amount</label>
                            <input
                                type="text"
                                name="min_deposit_amount"
                                id="min_deposit_amount"
                                class="form-control text-right @error('min_deposit_amount') is-invalid @enderror"
                                value="{{ $minDepositAmount }}"
                            >
                            @error('min_deposit_amount')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-6">
                        <div class="form-group">
                            <label for="min_withdraw_amount">Minimum Withdraw Amount</label>
                            <input
                                type="text"
                                name="min_withdraw_amount"
                                id="min_withdraw_amount"
                                class="form-control text-right @error('min_withdraw_amount') is-invalid @enderror"
                                value="{{ $minWithdrawAmount }}"
                            >
                            @error('min_withdraw_amount')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-6">
                        <div class="form-group">
                            <label for="min_transfer_amount">Minimum Transfer Amount</label>
                            <input
                                type="text"
                                name="min_transfer_amount"
                                id="min_transfer_amount"
                                class="form-control text-right @error('min_transfer_amount') is-invalid @enderror"
                                value="{{ $minTransferAmount }}"
                            >
                            @error('min_transfer_amount')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-6">
                        <div class="form-group">
                            <label for="transfer_commission">Transfer Commission, &</label>
                            <input
                                type="text"
                                name="transfer_commission"
                                id="transfer_commission"
                                class="form-control text-right @error('transfer_commission') is-invalid @enderror"
                                value="{{ $transferCommission }}"
                            >
                            @error('transfer_commission')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-4 col-lg-3 col-sm-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input
                            type="text"
                            name="address"
                            id="address"
                            class="form-control @error('address') is-invalid @enderror"
                            value="{{ $address }}"
                        >
                        @error('address')
                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-sm-12">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ $email }}"
                        >
                        @error('email')
                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="withdraw_message">Withdraw Message</label>
                        <textarea
                            name="withdraw_message"
                            id="withdraw_message"
                            cols="30"
                            rows="3"
                            class="form-control @error('withdraw_message') is-invalid @enderror"
                        >{{ $withdrawMessage }}</textarea>
                        @error('withdraw_message')
                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="trading_message">Trading Message</label>
                        <textarea
                            name="trading_message"
                            id="trading_message"
                            cols="30"
                            rows="10"
                            class="form-control editor-plugin @error('trading_message') is-invalid @enderror"
                        >{{ $tradingMessage }}</textarea>
                        @error('trading_message')
                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="secured_deal_warning">Secured Deal Warning</label>
                        <textarea
                            name="secured_deal_warning"
                            id="secured_deal_warning"
                            cols="30"
                            rows="10"
                            class="form-control editor-plugin @error('secured_deal_warning') is-invalid @enderror"
                        >{{ $securedDealWarning }}</textarea>
                        @error('secured_deal_warning')
                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="contact_us_header">Contact Us Header</label>
                        <input
                            type="text"
                            name="contact_us_header"
                            id="contact_us_header"
                            class="form-control @error('contact_us_header') is-invalid @enderror"
                            value="{{ $contactUsHeader }}"
                        >
                        @error('contact_us_header')
                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="payment_header">Payment Header</label>
                        <input
                            type="text"
                            name="payment_header"
                            id="payment_header"
                            class="form-control @error('payment_header') is-invalid @enderror"
                            value="{{ $paymentHeader }}"
                        >
                        @error('payment_header')
                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="contact_us_text">Contact Us Text</label>
                            <textarea
                                name="contact_us_text"
                                id="contact_us_text"
                                cols="30"
                                rows="10"
                                class="form-control editor-plugin @error('contact_us_text') is-invalid @enderror"
                            >{{ $contactUsText }}</textarea>
                            @error('contact_us_text')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="payment_text">Payment Text</label>
                            <textarea
                                name="payment_text"
                                id="payment_text"
                                cols="30"
                                rows="10"
                                class="form-control editor-plugin @error('payment_text') is-invalid @enderror"
                            >{{ $paymentText }}</textarea>
                            @error('payment_text')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-lg-2 col-sm-12">
                        <input
                            type="submit"
                            class="btn btn-primary d-block w-100"
                            value="Update"
                        >
                    </div>
                </div>
            </form>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script src="https://cdn.tiny.cloud/1/nnfvj0kbspvh5j6ydwa47qm4rpt8t90s75qszxsn28s1j35w/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        const editorItems = document.querySelectorAll('.editor-plugin');
        editorItems.forEach(item => {
            tinymce.init({
                selector: `textarea#${item.id}`
            });
        });
    </script>
@stop
