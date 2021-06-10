@extends('personal.layouts.main')

@section('content')
    <div class="wrapper">
        @include('includes.navbar')
        <div class="main">
            <div id="welcome" style="position: absolute;top: 50px;overflow: hidden;width: 100%;height: 300px;z-index: 99;"></div>
            <div class="container welcome" style="padding-top: 250px;">
                <div
                    class="welcome-block wow zoomIn"
                    data-wow-delay="0.2s"
                    data-wow-offset="0"
                >
                    {!! $mainWelcomeDescription !!}
                    @guest
                        <div class="d-flex justify-content-center align-center">
                            <div class="col-lg-6 col-md-10 row">
                                <div class="col-md-6">
                                    <a href="javascript:void(0);"
                                       data-toggle="modal" data-target="#registerModal"
                                       class="activeBtn d-block w-100 m-0 mb-2">
                                        Create Account
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="javascript:void(0);"
                                       data-toggle="modal" data-target="#loginModal"
                                       class="none-active activeBtn create d-block w-100 m-0">
                                        Log In
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>

                <div class="row mb-2 mt-5 mx-0">
                    <div class="wow bounceInLeft col-md-6 col-lg-3 mb-2">
                    <span class="advantage">
                        <span class="advantage-icon">
                            <i class="advantage-icon-item1"></i>
                        </span>
                        <span class="h3">Protection</span>
                        <span class="advantage-desc">
                           {!! $protectionAdvantage !!}
                        </span>
                    </span>
                    </div>

                    <div class="wow bounceInDown col-md-6 col-lg-3 mb-2">
                    <span class="advantage">
                        <span class="advantage-icon">
                            <i class="advantage-icon-item2"></i>
                        </span>
                        <span class="h3">Safety</span>
                        <span class="advantage-desc">
                            {!! $safetyAdvantage !!}
                        </span>
                    </span>
                    </div>

                    <div class="wow bounceInUp col-md-6 col-lg-3 mb-2">
                    <span class="advantage">
                        <span class="advantage-icon">
                            <i class="advantage-icon-item3"></i>
                        </span>
                        <span class="h3">24h support</span>
                        <span class="advantage-desc">
                            {!! $supportAdvantage !!}
                        </span>
                    </span>
                    </div>

                    <div class="wow bounceInRight col-md-6 col-lg-3 mb-2">
                    <span class="advantage">
                        <span class="advantage-icon">
                            <i class="advantage-icon-item4"></i>
                        </span>
                        <span class="h3">Stability</span>
                        <span class="advantage-desc">
                            {!! $stabilityAdvantage !!}
                        </span>
                    </span>
                    </div>
                </div>

                <div class="row secured-deal align-items-center mx-0">
                    <div class="col-md-6 col-12 wow fadeInLeft">
                        <img src="/images/secured-deal.png" alt="Secured Deal"/>
                    </div>
                    <div class="col-md-6 col-12 wow fadeInRight">
                        <p class="h1 text-white">Secured Deal</p>
                        <p class="text text-white">
                            {!! $securedDealDesc !!}
                        </p>
                        <p>
                            <a href="{{ route('secured-deal') }}" class="activeBtn d-block w-50">Try It</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-bg">
            <div class="container" id="app">
                <real-time-table></real-time-table>

                <div class="trading wow zoomIn">
                    <div class="row mx-0">
                        <p class="h1">Trading</p>
                        {!! $mainTradingDesc !!}
                    </div>
                </div>

                @include('main-page.partners')
            </div>

            @include('includes.footer')
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/welcome.js') }}"></script>
@endsection





