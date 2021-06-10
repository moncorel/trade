<div
    class="modal fade"
    id="createTransactionModal"
    tabindex="-1"
    role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-white shadow-none">
            <div class="modal-header">
                <h5 class="modal-title">Create Transaction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.transactions.add') }}" method="POST">
                @csrf
                <div class="modal-body text-left">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input
                                    type="text"
                                    name="amount"
                                    id="amount"
                                    class="form-control @error('amount') is-invalid @enderror"
                                    value="0.01"
                                >
                            </div>
                            @error('amount')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="type">Transaction Type</label>
                                <select
                                    name="type"
                                    id="type"
                                    class="form-control @error('type') is-invalid @enderror">
                                    <option value="{{ \App\Models\Transaction::DEPOSIT_TYPE }}">Deposit</option>
                                    <option value="{{ \App\Models\Transaction::WITHDRAW_TYPE }}">Withdraw</option>
                                    <option value="{{ \App\Models\Transaction::TRANSFER_TYPE }}">Transfer</option>
                                </select>
                                @error('type')
                                <small class="text-danger"><strong>{{ $message }}</strong></small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="currency_type">Transaction Currency Type</label>
                                <select
                                    name="currency_type"
                                    id="currency_type"
                                    class="form-control @error('currency_type') is-invalid @enderror">
                                    <option value="{{ \App\Models\Wallet::BTC_TYPE }}">BTC</option>
                                    <option value="{{ \App\Models\Wallet::ETH_TYPE }}">ETH</option>
                                    <option value="{{ \App\Models\Wallet::BCH_TYPE }}">BCH</option>
                                </select>
                                @error('currency_type')
                                <small class="text-danger"><strong>{{ $message }}</strong></small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="sender_nickname">Sender Nickname</label>
                                <input
                                    type="text"
                                    name="sender_nickname"
                                    id="sender_nickname"
                                    class="form-control @error('sender_nickname') is-invalid @enderror"
                                    value=""
                                >
                            </div>
                            @error('sender_nickname')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="receiver_nickname">Receiver Nickname</label>
                                <input
                                    type="text"
                                    name="receiver_nickname"
                                    id="receiver_nickname"
                                    class="form-control @error('receiver_nickname') is-invalid @enderror"
                                    value=""
                                >
                            </div>
                            @error('receiver_nickname')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                        <div class="col-12 d-none" id="external_address_block">
                            <div class="form-group">
                                <label for="external_address">External Address</label>
                                <input
                                    type="text"
                                    name="external_address"
                                    id="external_address"
                                    class="form-control @error('external_address') is-invalid @enderror"
                                    value=""
                                >
                            </div>
                            @error('external_address')
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
        </div>
    </div>
</div>
