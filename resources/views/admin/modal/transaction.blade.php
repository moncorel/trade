<div
    class="modal fade"
    id="transactionModal{{ $transaction->id }}"
    tabindex="-1"
    role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-white shadow-none">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Transaction #{{ $transaction->id }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.transactions.update') }}" method="POST">
                @csrf
                <input type="hidden"
                       name="transaction_id" value="{{ $transaction->id }}"
                >
                <div class="modal-body text-left">
                    <ul>
                        <li>Currency: <strong>{{ Str::upper($transaction->currency_type) }}</strong></li>
                        <li>Type: <strong>{{ $transaction->type }}</strong></li>
                        <li>
                            Sender:
                            <strong>
                                @if($transaction->sender)
                                    <a href="{{ route('admin.users.id', ['id' => $transaction->sender->id]) }}">
                                        {{ $transaction->sender->nickname ?? 'None' }}
                                    </a>
                                @else
                                    {{ $transaction->sender->nickname ?? 'None' }}
                                @endif
                            </strong>
                        </li>
                        <li>
                            Receiver:
                            <strong>
                                @if($transaction->receiver)
                                    <a href="{{ route('admin.users.id', ['id' => $transaction->receiver->id]) }}">
                                        {{ $transaction->receiver->nickname ?? 'None' }}
                                    </a>
                                @else
                                    {{ $transaction->receiver->nickname ?? 'None' }}
                                @endif
                            </strong>
                        </li>
                    </ul>
                    @if($transaction->created_at != $transaction->updated_at)
                        <div class="col-12 text-danger">
                            Last Transaction updated at {{ $transaction->updated_at }} <br>({{ $transaction->updated_at->diffForHumans() }})
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input
                                    type="text"
                                    name="amount"
                                    id="amount"
                                    class="form-control @error('amount') is-invalid @enderror"
                                    value="{{ $transaction->amount }}"
                                >
                            </div>
                            @error('amount')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                        @if($transaction->with_commission)
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="with_commission">Amount With Commission</label>
                                <input
                                    type="text"
                                    name="with_commission"
                                    id="with_commission"
                                    class="form-control @error('with_commission') is-invalid @enderror"
                                    value="{{ $transaction->with_commission }}"
                                >
                            </div>
                            @error('with_commission')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                        @endif
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="created_at">Created At</label>
                                <input
                                    type="text"
                                    name="created_at"
                                    id="created_at"
                                    class="form-control @error('created_at') is-invalid @enderror"
                                    value="{{ $transaction->created_at }}"
                                >
                            </div>
                            @error('created_at')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status"
                                        id="status"
                                        class="form-control"
                                        value="{{ $transaction->status }}"
                                >
                                    <option value="{{ \App\Models\Transaction::PROCESSING_STATUS }}">Processing</option>
                                    <option value="{{ \App\Models\Transaction::APPROVED_STATUS }}">Approved</option>
                                    <option value="{{ \App\Models\Transaction::FAILED_STATUS }}">Failed</option>
                                </select>
                            </div>
                            @error('status')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer row m-0">
                    <div class="col-md-6 col-sm-12 m-0">
                        <a
                            href="#"
                            class="btn btn-danger d-block w-100"
                            data-dismiss="modal"
                        >Cancel</a>
                    </div>
                    <div class="col-md-6 col-sm-12 m-0">
                        <input
                            type="submit"
                            class="d-block w-100 btn btn-success"
                            value="Save"
                        >
                    </div>
                </div>
            </form>
            <div class="modal-footer m-0 d-block">

{{--                <div class="row m-0">--}}
{{--                    <div class="col-md-6 col-sm-12 m-0">--}}
{{--                        <form--}}
{{--                            action="{{ route('admin.transactions.change-status') }}"--}}
{{--                            method="POST"--}}
{{--                        >--}}
{{--                            @csrf--}}
{{--                            @method('PUT')--}}
{{--                            <input type="hidden"--}}
{{--                                   name="transaction_id" value="{{ $transaction->id }}"--}}
{{--                            >--}}
{{--                            <input--}}
{{--                                type="hidden"--}}
{{--                                name="status"--}}
{{--                                value="{{ \App\Models\Transaction::APPROVED_STATUS }}"--}}
{{--                            >--}}
{{--                            <input--}}
{{--                                type="submit"--}}
{{--                                class="d-block w-100 btn btn-success"--}}
{{--                                value="Approve"--}}
{{--                            >--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 col-sm-12 m-0">--}}
{{--                        <form--}}
{{--                            action="{{ route('admin.transactions.change-status') }}"--}}
{{--                            method="POST"--}}
{{--                        >--}}
{{--                            @csrf--}}
{{--                            @method('PUT')--}}
{{--                            <input type="hidden"--}}
{{--                                   name="transaction_id" value="{{ $transaction->id }}"--}}
{{--                            >--}}
{{--                            <input--}}
{{--                                type="hidden"--}}
{{--                                name="status"--}}
{{--                                value="{{ \App\Models\Transaction::FAILED_STATUS }}"--}}
{{--                            >--}}
{{--                            <input--}}
{{--                                type="submit"--}}
{{--                                class="d-block w-100 btn btn-danger"--}}
{{--                                value="Decline"--}}
{{--                            >--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
