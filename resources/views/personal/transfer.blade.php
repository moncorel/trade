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
                        <div class="col-lg-6 col-md-12 mb-4 wow fadeInDown" data-wow-delay="0.2s">
                            <div class="col-12 p-4 bg-block">
                                <p class="h5">Currency</p>
                                @if(session('transfer_success'))
                                    <p class="bg-success p-3 rounded text-light" id="upd_pass">
                                        {{ session('transfer_success') }}
                                        <span onclick="closeUpdName('transfer_success')"
                                              class="float-md-right text-dark font-weight-bold cursor-pointer">
                                        X
                                    </span>
                                    </p>
                                @endif
                                <form action="" id="w0" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="text-white font-16"
                                               for="history-wallet"
                                        >
                                            <i class="fas fa-random"></i>
                                            From
                                        </label>
                                        <select name="currency" id="history-wallet">
                                            <option value="btc" selected>Bitcoin</option>
                                            <option value="eth">Ethereum</option>
                                            <option value="bch">Bitcoin Cash</option>
                                        </select>
                                    </div>
                                    <div class="form-group row mx-0">
                                        <div class="col-lg-5 pl-lg-0 pr-lg-1 col-md-12 px-md-0 px-0">
                                            <div>
                                                <label class="text-white font-16" for="transfer-amount">
                                                    <i class="fas fa-sort-numeric-up"></i>
                                                    Amount
                                                </label>
                                                <input
                                                    type="text"
                                                    id="transfer-amount"
                                                    class="form-control fields-item text-right mb-4
                                            @error('amount') is-invalid @enderror"
                                                    name="amount" value="{{ $minTransferAmount }}" required
                                                >
                                                @error('amount')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-7 pr-lg-0 pl-lg-1 col-md-12 px-md-0 px-0">
                                            <div class="">
                                                <label class="text-white font-16" for="transfer-commission">
                                                    <i class="fas fa-percent"></i>
                                                    With commission
                                                </label>
                                                <input
                                                    type="text"
                                                    id="transfer-commission"
                                                    disabled
                                                    class="form-control fields-item text-left mb-4 text-md-right"
                                                    name="commission"
                                                    value=""
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="text-white font-16" for="transfer-address">
                                            <i class="fas fa-wallet"></i>
                                            Address
                                        </label>
                                        <input type="text" id="transfer-address"
                                               class="form-control fields-item text-left mb-4
                                            @error('amount') is-invalid @enderror"
                                               name="address">
                                        @error('address')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>

                                    <input type="submit" class="mt-4 d-block w-100 activeBtn" value="Transfer!">
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 max-height-200 wow fadeInDown">
                            @include('personal.includes.trading-block')
                        </div>
                    </div>
                    <div class="row warn-block w-100 mx-0 mb-5">
                        <div class="col-12 col-sm-2 p-0 m-0 text-center">
                        <span class="alert-ico">
                            <i class="fas fa-exclamation-triangle attention"></i>
                        </span>
                        </div>
                        <div class="col-12 col-sm-10 p-0 m-0">
                        <span class="alert-text">
                            The addresses on this page are intended for internal transfers between one customer of our<br> exchange to another only.
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-bg">
                @include('includes.footer')
            </div>
        </div>
    </div>
    <script>
        const amountInp = document.getElementById('transfer-amount');
        const commissionInp = document.getElementById('transfer-commission');
        commissionInp.value = (amountInp.value * "{{ $commission }}").toPrecision(3);

        amountInp.oninput = function () {
            commissionInp.value = (amountInp.value * "{{ $commission }}").toPrecision(3);
        };
    </script>
@endsection


