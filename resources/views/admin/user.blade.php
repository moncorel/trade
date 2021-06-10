@extends('adminlte::page')

@section('title', 'User | ' . $user->nickname)

@section('content_header')

@stop

@section('content')
    <div class="wrapper">
        <a href="{{ route('admin.users') }}" class="btn btn-success">
            <i class="fas fa-arrow-left"></i>
            Back
        </a>
        <div class="row justify-content-between mt-4">
            <div class="col-lg-6 col-sm-12 text-left">
                <h1 class="mb-0">User <u>{{ $user->nickname }}</u></h1><br>
                {{ $user->created_at }}
            </div>
            @if(Auth::id() !== $user->id)
            <div class="col-lg-6 col-sm-12 text-right">
                <a
                    class="btn btn-danger"
                    href="#"
                    role="button"
                    data-toggle="modal"
                    data-target="#deleteUserModal"
                >
                    <i class="fas fa-trash"></i>
                    Delete User
                </a>
            </div>
            @endif
        </div>
        <hr>
        @if(session('user_success'))
        <p class="bg-success p-2 rounded text-white font-weight-bold col-3">
            {{ session('user_success') }}
        </p>
        @endif
        <form action="" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="nickname">Nickname</label>
                        <input id="nickname"
                               type="text"
                               name="nickname"
                               class="form-control @error('nickname') is-invalid @enderror"
                               value="{{ $user->nickname }}"
                        >
                        @error('nickname')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email"
                               type="email"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ $user->email }}"
                        >
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="new_password">New password</label>
                        <input id="new_password"
                               type="password"
                               name="new_password"
                               class="form-control @error('new_password') is-invalid @enderror"
                        >
                        @error('new_password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="new_password_confirmation">New password confirmation</label>
                        <input id="new_password_confirmation"
                               type="password"
                               name="new_password_confirmation"
                               class="form-control @error('new_password_confirmation') is-invalid @enderror"
                        >
                        @error('new_password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-2 col-md-2 col-sm-12">
                    <input
                        type="submit"
                        class="btn btn-primary d-block w-100"
                        value="Update User"
                    >
                </div>
            </div>
        </form>

        <h2>Wallets</h2>
        <hr>
        @if(session('wallets_success'))
            <p class="bg-success p-2 rounded text-white font-weight-bold col-3">
                {{ session('wallets_success') }}
            </p>
        @endif

        <form action="{{ route('admin.users.update') }}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h4>BTC Wallet</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="btc_address">Address</label>
                                <input id="btc_address"
                                       name="btc_address"
                                       type="text"
                                       class="form-control @error('btc_address') is-invalid @enderror"
                                       value="{{ $user->btcWallet->address }}"
                                >
                                @error('btc_address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="btc_amount">Amount</label>
                                <input id="btc_amount"
                                       type="text"
                                       name="btc_amount"
                                       class="form-control @error('btc_amount') is-invalid @enderror"
                                       value="{{ $user->btcWallet->amount }}"
                                >
                                @error('btc_amount')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h4>ETH Wallet</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="eth_address">Address</label>
                                <input id="eth_address"
                                       type="text"
                                       name="eth_address"
                                       class="form-control @error('eth_address') is-invalid @enderror"
                                       value="{{ $user->ethWallet->address }}"
                                >
                                @error('eth_address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="eth_amount">Amount</label>
                                <input id="eth_amount"
                                       type="text"
                                       name="eth_amount"
                                       class="form-control @error('eth_amount') is-invalid @enderror"
                                       value="{{ $user->ethWallet->amount }}"
                                >
                                @error('eth_amount')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h4>BCH Wallet</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="bch_address">Address</label>
                                <input id="bch_address"
                                       type="text"
                                       name="bch_address"
                                       class="form-control @error('bch_address') is-invalid @enderror"
                                       value="{{ $user->bchWallet->address }}"
                                >
                                @error('bch_address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="bch_amount">Amount</label>
                                <input id="bch_amount"
                                       type="text"
                                       name="bch_amount"
                                       class="form-control @error('bch_amount') is-invalid @enderror"
                                       value="{{ $user->bchWallet->amount }}"
                                >
                                @error('bch_amount')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-2 col-md-2 col-sm-12">
                    <input
                        type="submit"
                        class="btn btn-primary d-block w-100"
                        value="Update Wallets"
                    >
                </div>
            </div>
        </form>

        <h2>Transactions</h2>
        <hr>
        @if($transactions->count())
            <table id="users-table" class="table table-hover table-responsive-lg">
                <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Way</th>
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
                            @if($transaction->sender->id === $user->id)
                                <strong>Sender</strong>
                            @elseif($transaction->receiver->id === $user->id)
                                <strong>Receiver</strong>
                            @endif
                        </td>
                        <td>
                            {{ $transaction->amount }}
                        </td>
                        <td>{{ $transaction->currency_type }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->status }}</td>
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
            <h2 class="text-center">There is no transaction for this User!</h2>
        @endif

    </div>
    @include('admin.modal.delete-user', ['id' => $user->id])
@stop

@section('css')

@stop

@section('js')

@endsection
