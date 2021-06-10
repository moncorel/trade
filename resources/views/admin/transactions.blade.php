@extends('adminlte::page')

@section('title', 'Transactions')

@section('content_header')
@stop

@section('content')
    @include('admin.modal.create-transaction')
    <div class="wrapper bg-transparent">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                <h1>Transactions</h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-right">
                <a href="#"
                   class="btn btn-primary"
                   data-toggle="modal"
                   data-target="#createTransactionModal"
                >
                    <i class="fas fa-plus"></i>
                    Add Transaction
                </a>
            </div>
        </div>

        @include('includes.alerts')
        <div class="">
            @if($transactions->count())
            <table id="users-table" class="table table-hover table-responsive-lg">
                <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Amount</th>
                    <th>Currency</th>
                    <th>Type</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($transactions as $transaction)
                    <tr class="text-center">
                        <td>{{ $transaction->id }}</td>
                        <td>
                            {{ $transaction->amount }}
                        </td>
                        <td>{{ Str::upper($transaction->currency_type) }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>
                            @include('personal.includes.status-block', ['status' => $transaction->status,'displayText' => true])
                        </td>
                        <td>
                            <a
                                href="#"
                                class="btn btn-outline-primary"
                                data-toggle="modal"
                                data-target="#transactionModal{{ $transaction->id }}"
                            >
                                View
                            </a>
                            @include('admin.modal.transaction', ['transaction' => $transaction])
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <h2 class="text-center">There is no transactions here!</h2>
            @endif
        </div>
        <div class="d-flex justify-content-end">
            {{ $transactions->links() }}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
@stop

@section('js')
    <script>
        const transactionTypeSelect = document.getElementById('type');
        const externalAddressBlock = document.getElementById('external_address_block');
        transactionTypeSelect.onchange = (event) => {
            externalAddressBlock.classList.add('d-none');
            if (event.target.value === 'withdraw') {
                externalAddressBlock.classList.remove('d-none');
            }
        }
        @if(session('modal') === 'create_transaction')
        window.$('#createTransactionModal').modal('show');
        @endif
        @if(session('modal') === 'transactionModal')
            const transactionId = {{ session('modal_id') }};
            console.log(transactionId);
        window.$('#transactionModal' + transactionId).modal('show');
        @endif
    </script>
@endsection
