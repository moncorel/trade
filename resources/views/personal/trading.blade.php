@extends('personal.layouts.main')

@section('content')
    <div class="wrapper">
        @include('includes.navbar')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 bg-block p-4">
                    <p class="font-weight-bold text-white font-24">Trading</p>
                    <div class="tradingview-widget-container">
                        <div id="tradingview_73d23"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            new TradingView.widget(
                                {
                                    "width": "100%",
                                    "height": 610,
                                    "symbol": "BITBAY:BTCUSD",
                                    "interval": "D",
                                    "timezone": "Etc/UTC",
                                    "theme": "dark",
                                    "style": "2",
                                    "locale": "en",
                                    "toolbar_bg": "#f1f3f6",
                                    "enable_publishing": false,
                                    "withdateranges": true,
                                    "hide_side_toolbar": false,
                                    "allow_symbol_change": true,
                                    "details": true,
                                }
                            );
                        </script>
                    </div>

                    <div class="row warn-block w-100 mx-0 mt-5">
                        <div class="col-12 col-sm-2 p-0 m-0 text-center">
                        <span class="alert-ico">
                            <i class="fas fa-exclamation-triangle attention"></i>
                        </span>
                        </div>
                        <div class="col-12 col-sm-10 p-0 m-0">
                        <span class="alert-text">
                            {!! $tradingMessage !!}
                        </span>
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
