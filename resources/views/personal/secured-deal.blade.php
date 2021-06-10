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
                    <div class="row mx-0 bg-block p-4 wow fadeInDown" data-wow-delay="0.2s">
                        <p class="h5">Secured Deal</p>

                        <div class="text-block font-16 text-white-50">
                            {!! $securedDealWarning !!}
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-2 col-md-2 col-sm-12">
                                <a href="{{ route('secured-deal.create') }}" class="activeBtn d-block w-100">
                                    Create
                                </a>
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
