@extends('personal.layouts.main')

@section('content')
    <div class="user-page">
        @include('includes.navbar')
        <div class="container" id="app">
            <div class="row mx-0">
                <div class="col-12 col-md-4 col-lg-3 col-xl-2 pt-0 pb-2 wow fadeInDown" data-wow-delay="0.6s">
                    @include('personal.includes.leftSidebar')
                </div>

                <div class="col-12 col-md-8 col-lg-9 col-xl-10 p-0">
                    <div class="row mx-0">
                        <div class="col-lg-6 col-md-12 wow fadeInDown" data-wow-delay="0.3s">
                            <div class="col-12 bg-block p-4">
                                <p class="h5">Currency</p>

                                <form action="{{ route('withdraw.create') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-0">
                                        <label class="text-white font-16" for="history-wallet">
                                            <i class="fas fa-random"></i>
                                            From
                                        </label>
                                        <select name="currency" id="history-wallet">
                                            <option value="btc" selected>Bitcoin</option>
                                            <option value="eth">Ethereum</option>
                                            <option value="bch">Bitcoin Cash</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="text-white font-16 mt-4" for="amount">
                                            <i class="fas fa-sort-numeric-up"></i>
                                            Amount
                                        </label>
                                        <input type="text" id="amount"
                                               class="form-control fields-item text-right
                                            @error('amount') is-invalid @enderror"
                                               name="amount" value="{{ $minWithdrawAmount }}">
                                        @error('amount')
                                        <small class="text-danger d-block">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="text-white font-16 mt-4" for="external_address">
                                            <i class="fas fa-wallet"></i>
                                            External Address
                                        </label>
                                        <input type="text" id="external_address"
                                               class="form-control fields-item text-left
                                            @error('external_address') is-invalid @enderror"
                                               name="external_address">
                                        @error('external_address')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <input
                                        type="submit"
                                        value="Withdraw!"
                                        class="activeBtn d-block w-100 mt-4" />
                                </form>
                            </div>
                        </div>
                        @if(session('success'))
                        <div class="col-lg-6">
                            <p class="bg-success p-2 rounded text-white font-weight-bold">
                                {{ session('success') }}
                            </p>
                        </div>
                        @endif
                    </div>

                    <div class="row mx-0 mt-4 wow fadeInDown">
                        <div class="col-12">
                            <div class="bg-block p-4">
                                <p class="h5">Withdraw requests</p>

                                @if(!count($withdrawals))
                                    <p class="text-white font-16 mt-3 mb-0">No withdrawal requests</p>
                                @else
                                    <table class="transactions-table personal-data-table border-top-0 w-100">
                                        <tr>
                                            <th>Date time</th>
                                            <th>Amount</th>
                                            <th>Currency</th>
                                            <th>Address External</th>
                                            <th>Status</th>
                                        </tr>
                                        @foreach($withdrawals as $withdrawal)
                                            <tr>
                                                <td class="font-12">{{ $withdrawal->created_at }}</td>
                                                <td>{{ $withdrawal->amount }}</td>
                                                <td>{{ strtoupper($withdrawal->currency_type) }}</td>
                                                <td class="">
                                                    <copy-input-block
                                                        :text="{{ json_encode($withdrawal->external_address) }}"
                                                        :element-id="{{ json_encode($withdrawal->id . '_withdrawal') }}"
                                                    >
                                                    </copy-input-block>
                                                </td>
                                                <td>
                                                    <status-block
                                                        :status="{{ json_encode($withdrawal->status) }}"
                                                    >
                                                    </status-block>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <div class="mobile-transactions-view">
                                        @foreach($withdrawals as $transaction)
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
@endsection

