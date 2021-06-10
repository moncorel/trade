@extends('personal.layouts.main')

@section('head-links')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
    <div class="user-page">
        @include('includes.navbar')
        <div class="container">
            <div class="row mx-0">
                <div class="col-12 col-md-4 col-lg-3 col-xl-2 pt-0 pb-2 wow fadeInDown" data-wow-delay="0.4s">
                    @include('personal.includes.leftSidebar')
                </div>

                <div class="col-12 col-md-8 col-lg-9 col-xl-10 p-0">
                    <div class="row mx-0 bg-block p-4 wow fadeInDown" data-wow-delay="0.2s">
                        <p class="h5">Secured Deal</p>

                        <div class="row mx-0">
                            <div class="col-12">
                                @if(session('secured_deal_success'))
                                    <p class="bg-success p-2 rounded text-white font-weight-bold">
                                        {{ session('secured_deal_success') }}
                                    </p>
                                @endif
                                <p class="text-white font-16 font-weight-bold">
                                    <i class="fas fa-exchange-alt color-primary"></i>
                                    You
                                </p>
                                <form action="{{ route('secured-deal.save') }}" method="POST">
                                    @csrf
                                    <div class="form-check my-4 row" id="seller-buyer-block">
                                        <div class="col-6 col-lg-2 mr-4 pl-0">
                                            <input
                                                class="form-check-input d-none"
                                                type="radio"
                                                name="deal_type"
                                                id="seller"
                                                value="seller"
                                                checked
                                            >
                                            <label
                                                class="form-check-label cursor-pointer text-white font-16"
                                                for="seller"
                                            >
                                                <i class="far fa-dot-circle color-primary"
                                                   id="seller-checked"
                                                ></i>
                                                <i class="far fa-circle color-primary d-none"
                                                   id="seller-not-checked"
                                                ></i>
                                                Seller
                                            </label>
                                        </div>
                                        <div class="col-6 col-lg-2 pl-0 cursor-pointer">
                                            <input
                                                class="form-check-input d-none"
                                                type="radio"
                                                name="deal_type"
                                                id="buyer"
                                                value="buyer"
                                            >
                                            <label
                                                class="form-check-label cursor-pointer text-white font-16"
                                                for="buyer"
                                            >
                                                <i class="far fa-dot-circle color-primary d-none"
                                                   id="buyer-checked"
                                                ></i>
                                                <i class="far fa-circle color-primary"
                                                   id="buyer-not-checked"
                                                ></i>
                                                Buyer
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="text-white font-16" for="second_party_nickname">
                                            <i class="fas fa-user-tag"></i>
                                            Second Party nickname
                                        </label>
                                        <input type="text"
                                               name="second_party_nickname"
                                               id="second_party_nickname"
                                               class="form-control @error('second_party_nickname') is-invalid @enderror"
                                               value="{{ old('second_party_nickname') }}"
                                        >
                                        @error('second_party_nickname')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="text-white font-16" for="deal_conditions">
                                            <i class="fas fa-file-alt"></i>
                                            Deal Conditions
                                        </label>
                                        <textarea
                                            class="form-control @error('deal_conditions') is-invalid @enderror"
                                            id="deal_conditions"
                                            rows="3"
                                            name="deal_conditions"
                                        >{{ old('deal_conditions') }}</textarea>
                                        @error('deal_conditions')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="text-white font-16" for="deadline">
                                            <i class="fas fa-stopwatch"></i>
                                            Deal's Deadline
                                        </label>
                                        <input type="text"
                                               id="deadline"
                                               name="deadline"
                                               class="form-control">
                                        @error('deadline')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="text-white font-16" for="currency">
                                            <i class="fas fa-coins"></i>
                                            Currency
                                        </label>
                                        <select name="currency" id="currency">
                                            <option value="btc" selected>Bitcoin</option>
                                            <option value="eth">Ethereum</option>
                                            <option value="bch">Bitcoin Cash</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-white font-16" for="amount">
                                            <i class="fas fa-sort-numeric-up"></i>
                                            Amount
                                        </label>
                                        <input type="text"
                                               name="amount"
                                               id="amount"
                                               value="0.01"
                                               class="form-control mb-4 text-right @error('amount') is-invalid @enderror"
                                        >
                                        @error('amount')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group d-none" id="deal-password-block">
                                        <label class="text-white font-16" for="deal_password">
                                            <i class="fas fa-lock"></i>
                                            Password to complete the deal
                                        </label>
                                        <input type="password"
                                               name="deal_password"
                                               id="deal_password"
                                               class="form-control mb-4 text-right @error('deal_password') is-invalid @enderror"
                                        >
                                        @error('deal_password')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>

                                    <input
                                        type="submit"
                                        value="Create a Secured Deal request"
                                        class="activeBtn d-block w-100"
                                    >
                                </form>
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

@section('body-scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('input#deadline', {
            enableTime: true,
            dateFormat: 'd-m-Y H:i:S',
            time_24hr: true,
            enableSeconds: true,
            minDate: Date.now()
        });
        const buyerRadio = document.getElementById('buyer');
        const sellerBuyerBlock = document.getElementById('seller-buyer-block');
        const sellerCheckedIcon = document.getElementById('seller-checked');
        const sellerNotCheckedIcon = document.getElementById('seller-not-checked');

        const buyerCheckedIcon = document.getElementById('buyer-checked');
        const buyerNotCheckedIcon = document.getElementById('buyer-not-checked');
        sellerBuyerBlock.addEventListener('click', function () {
            if (buyerRadio.checked) {
                sellerCheckedIcon.classList.add('d-none');
                sellerNotCheckedIcon.classList.remove('d-none');
                buyerCheckedIcon.classList.remove('d-none');
                buyerNotCheckedIcon.classList.add('d-none');
                document.getElementById('deal-password-block').classList.remove('d-none');
            } else {
                sellerCheckedIcon.classList.remove('d-none');
                sellerNotCheckedIcon.classList.add('d-none');
                buyerCheckedIcon.classList.add('d-none');
                buyerNotCheckedIcon.classList.remove('d-none');
                document.getElementById('deal-password-block').classList.add('d-none');
            }
        });
    </script>
@endsection




