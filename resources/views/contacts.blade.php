@extends('personal.layouts.main')

@section('content')
    <div class="terms-page min-vh-100">
        <div class="about-info">
            @include('includes.navbar')
            <div class="container">
                <div class="row mx-0">
                    <div class="about mb-4">
                        <h1 class="h1-about">{{ $contactUsHeader }}</h1>
                        {!! $contactUsText !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-bg">
            @include('includes.footer')
        </div>
    </div>
@endsection
