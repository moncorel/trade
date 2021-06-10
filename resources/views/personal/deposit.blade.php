@extends('personal.layouts.main')

@section('content')
    <div class="user-page wrapper">
        @include('includes.navbar')
        <div class="container" id="app">
            <div class="row mx-0">
                <div class="col-12 col-md-4 col-lg-3 col-xl-2 pt-0 pb-2 wow fadeInDown" data-wow-delay="0.4s">
                    @include('personal.includes.leftSidebar')
                </div>

                <div class="col-12 col-md-8 col-lg-9 col-xl-10 p-0">
                    <div class="row mx-0">
                        <div class="col-md-6 wow fadeInDown mb-4" data-wow-delay="0.4s">
                            <div class="col-12 bg-block p-4">
                                <p class="h5">Currency</p>

                                <form action="{{ route('deposit.create') }}" id="wd" method="post">
                                    @csrf
                                    <input type="text" name="id" hidden>
                                    <div class="form-group">
                                        <label class="text-white font-16" for="currency-select">
                                            <i class="fas fa-random"></i>
                                            From
                                        </label>
                                        <select name="currency" id="currency-select">
                                            <option value="btc" selected>Bitcoin</option>
                                            <option value="eth">Ethereum</option>
                                            <option value="bch">Bitcoin Cash</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-16 text-white" for="deposit-amount">
                                            <i class="fas fa-sort-numeric-up"></i>
                                            Amount
                                        </label>
                                        <input
                                            type="text"
                                            id="deposit-amount"
                                            class="form-control text-right fields-item
                                        @error('amount') is-invalid @enderror"
                                            name="amount" value="{{ $minDepositAmount }}"
                                        >
                                        @error('amount')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="text-center d-block">
                                        <input
                                            type="submit"
                                            name="deposit"
                                            id="dep"
                                            class="activeBtn w-100 mt-4"
                                            value="Deposit"
                                        />
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 max-height-200 wow fadeInDown" data-wow-delay="0.2s">
                            @include('personal.includes.trading-block')
                        </div>
                    </div>
                    <div class="row mt-4 mx-0">
                        <div class="col-12">
                            <div class="bg-block p-4">
                                <p class="h5">Deposit requests</p>
                                @if(!count($transactions))
                                    <p class="text-white font-16 mt-3 mb-0">No transactions yet.</p>
                                @else
                                    <table class="transactions-table personal-data-table border-top-0 w-100">
                                        <tr>
                                            <th>Date time</th>
                                            <th>Amount</th>
                                            <th>Currency</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                        </tr>
                                        @foreach($transactions as $transaction)
                                            <tr>
                                                <td class="font-12 text-center">{{ $transaction->created_at }}</td>
                                                <td class="text-center font-16">{{ $transaction->amount }}</td>
                                                <td class="text-center font-16">{{ strtoupper($transaction->currency_type) }}</td>
                                                <td class="">
                                                    <copy-input-block
                                                        :text="{{ json_encode($transaction->external_address) }}"
                                                        :element-id="{{ json_encode($transaction->id . '_deposit') }}"
                                                    >
                                                    </copy-input-block>
                                                </td>
                                                <td>
                                                    <status-block
                                                        :status="{{ json_encode($transaction->status) }}"
                                                    >
                                                    </status-block>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <div class="mobile-transactions-view">
                                        @foreach($transactions as $transaction)
                                            <div class="row mobile-table mx-0 mb-1">
                                                <div class="col-12 row mobile-table-row mx-0">
                                                    <div class="col-6 mobile-table-th">Datetime</div>
                                                    <div class="col-6 mobile-table-td">{{ $transaction->created_at }}</div>
                                                </div>
                                                <div class="col-12 row mobile-table-row mx-0">
                                                    <div class="col-6 mobile-table-th">Amount</div>
                                                    <div class="col-6 mobile-table-td">{{ $transaction->amount }}</div>
                                                </div>
                                                <div class="col-12 row mobile-table-row mx-0">
                                                    <div class="col-6 mobile-table-th">Currency</div>
                                                    <div class="col-6 mobile-table-td">
                                                        {{ $transaction->currency_type }}
                                                    </div>
                                                </div>
                                                <div class="col-12 row mobile-table-row mx-0">
                                                    <div class="col-6 mobile-table-th">Address External</div>
                                                    <div class="col-6 mobile-table-td">
                                                        <copy-input-block
                                                            :text="{{ json_encode($transaction->external_address) }}"
                                                            :element-id="{{ json_encode($transaction->id . '_deposit') }}"
                                                        >
                                                        </copy-input-block>
                                                    </div>
                                                </div>
                                                <div class="col-12 row mobile-table-row mx-0">
                                                    <div class="col-6 mobile-table-th">Status</div>
                                                    <div class="col-6 mobile-table-td">
                                                        <status-block
                                                            :status="{{ json_encode($transaction->status) }}"
                                                            display-text="true"
                                                        >
                                                        </status-block>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
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

    @if(session('deposit'))
        @include('modal.deposit')
    @endif
@endsection
