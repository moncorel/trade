@extends('personal.layouts.main')

@section('content')
    <div class="user-page min-vh-100">
        @include('includes.navbar')
        <div class="container" id="app">
            <div class="row mx-0">
                <div class="col-12 col-md-4 col-lg-3 col-xl-2 pt-0 pb-2 wow fadeInDown" data-wow-delay="0.2s">
                    @include('personal.includes.leftSidebar')
                </div>
                <div class="col-12 col-md-8 col-lg-9 col-xl-10 wow fadeInDown p-0">
                    <div class="row mx-0">
                        <div class="col-12 bg-block p-4">
                            <p class="h5 mb-4">History</p>

                            @if(!count($transactions))
                                <p class="text-white font-16 mt-3 mb-0">No transactions yet.</p>
                            @else
                                <table class="transactions-table personal-data-table text-black w-100">
                                    <tr>
                                        <th>Date time</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        <th class="font-12">
                                            Transaction info
                                        </th>
                                        <th>Type of transaction</th>
                                        <th>Status</th>
                                    </tr>

                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td class="font-12">{{ $transaction->created_at }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>{{ strtoupper($transaction->currency_type) }}</td>
                                            <td class="font-12">
                                                @if(in_array($transaction->type, [\App\Models\Transaction::DEPOSIT_TYPE, \App\Models\Transaction::WITHDRAW_TYPE]))
                                                    {{ $transaction->external_address }}
                                                @endif
                                            </td>
                                            <td>
                                                {{ $transaction->type }}
                                            </td>
                                            <td>
                                                <status-block
                                                    :status="{{ json_encode($transaction->status) }}"
                                                    :display-text="true"
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
                                                    @if(in_array($transaction->type, [\App\Models\Transaction::DEPOSIT_TYPE, \App\Models\Transaction::WITHDRAW_TYPE]))
                                                        {{ $transaction->external_address }}
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12 row mobile-table-row mx-0">
                                                <div class="col-6 mobile-table-th">Type</div>
                                                <div class="col-6 mobile-table-td">
                                                    {{ $transaction->type }}
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
        <div class="bottom-bg">
            @include('includes.footer')
        </div>
    </div>
@endsection



