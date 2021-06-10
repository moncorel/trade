@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
@stop

@section('content')
    <div class="wrapper">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                <h1>Users</h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-right">
                <a class="btn btn-success" href="{{ route('admin.users.create') }}" role="button">
                    <i class="fas fa-plus"></i>
                    Add User
                </a>
            </div>
        </div>
        @if(session('users_success'))
        <p class="rounded col-3 bg-success p-2 text-white font-weight-bold">
            {{ session('users_success') }}
        </p>
        @endif
        <div class="">
            @if($users->count())
            <table id="users-table" class="table table-hover table-responsive-lg">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Nickname</th>
                        <th>E-mail</th>
                        <th>Created At</th>
                        <th>BTC</th>
                        <th>ETH</th>
                        <th>BCH</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr class="text-center">
                        <td>{{ $user->id }}</td>
                        <td>
                            {{ $user->nickname }}
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->btcWallet->amount }}</td>
                        <td>{{ $user->ethWallet->amount }}</td>
                        <td>{{ $user->bchWallet->amount }}</td>
                        <td>
                            <a
                                href="{{ route('admin.users.id', ['id' => $user->id]) }}"
                                class="btn btn-outline-primary"
                            >
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <h2 class="text-center">There is no users</h2>
            @endif
        </div>
        <div class="d-flex justify-content-end">
            {{ $users->links() }}
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@endsection
