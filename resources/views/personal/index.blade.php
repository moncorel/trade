@include('includes.header')

<div class="user-page">
    @include('includes.navbar')
    <div class="container">
        <div class="row mx-0">
            <div class="col-12 col-md-4 col-lg-3 col-xl-2 pt-0 pb-2 wow fadeInDown">
                @include('personal.includes.leftSidebar')
            </div>

            <div class="col-12 col-md-8 col-lg-9 col-xl-10 p-0 wow fadeInDown">
                <div class="user-wallets">
                    <span class="h5">Wallets = {{ number_format($total_money, 2, '.', ' ') }} USD</span>
                </div>

                <div class="user-wallets mt-3 row ml-0 text-center">
                    <span class="h5 col-md-4">BTC - {{ $courses['btc'] }} USD</span>
                    <span class="h5 col-md-4">ETH - {{ $courses['eth'] }} USD</span>
                    <span class="h5 col-md-4">BCH - {{ $courses['bch'] }} USD</span>
                </div>

                <div id="app">
                    <crypto-currency-block
                        :wallet="{{ json_encode(Auth::user()->btcWallet) }}"
                        :course="{{ json_encode($courses['btc']) }}"
                        currency-type="btc"
                        currency-name="Bitcoin"
                    >
                    </crypto-currency-block>

                    <crypto-currency-block
                        :wallet="{{ json_encode(Auth::user()->ethWallet) }}"
                        :course="{{ json_encode($courses['eth']) }}"
                        currency-type="eth"
                        currency-name="Ethereum"
                    >
                    </crypto-currency-block>

                    <crypto-currency-block
                        :wallet="{{ json_encode(Auth::user()->bchWallet) }}"
                        :course="{{ json_encode($courses['bch']) }}"
                        currency-type="bch"
                        currency-name="BitcoinCash"
                    >
                    </crypto-currency-block>
                </div>

                <div class="row warn-block w-100 mx-0 mb-5">
                    <div class="col-12 col-sm-2 p-0 m-0 text-center">
                        <span class="alert-ico">
                            <i class="fas fa-exclamation-triangle attention"></i>
                        </span>
                    </div>
                    <div class="col-12 col-sm-10 p-0 m-0">
                        <span class="alert-text">
                            The addresses on this page are intended for internal transfers between one customer of our<br> exchange to another only.
                        </span>
                    </div>
                </div>

                <div class="bg-block p-4 mb-2">
                    <span class="h5" id="chart-name">Bitcoin Chart</span>
                </div>

                <div class="bg-block p-4">
                    <div class="tradingview-widget-container mb-3">
                        <div id="tradingview_73d23"></div>
                    </div>

                    <div class="chart-buttons row mx-0 my-4 justify-content-center">
                        <div class="col-lg-2 col-md-2 col-sm-12 text-center">
                            <a
                                href="javascript:void(0);"
                                onclick="changeSymbol('BITBAY:BTCUSD', 'btc-btn')"
                                class="activeBtn clickedBtn mr-0"
                                id="btc-btn"
                            >
                                Bitcoin
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 text-center">
                            <a
                                href="javascript:void(0);"
                                onclick="changeSymbol('KRAKEN:ETHUSD', 'eth-btn')"
                                class="activeBtn clickedBtn"
                                id="eth-btn"
                            >
                                Ethereum
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 text-center">
                            <a
                                href="javascript:void(0);"
                                onclick="changeSymbol('KRAKEN:BCHUSD', 'bch-btn')"
                                class="none-active activeBtn"
                                id="bch-btn"
                            >
                                BitcoinCash
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

<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
<script type="text/javascript">
    const symbol = "BITBAY:BTCUSD";

    const chartNames = {
        "BITBAY:BTCUSD": "Bitcoin Chart",
        "KRAKEN:ETHUSD": "Ethereum Chart",
        "KRAKEN:BCHUSD": "BitcoinCash Chart",
    };

    let widgetObj = new TradingView.widget(
        {
            "width": "100%",
            "height": 610,
            "symbol": symbol,
            "interval": "D",
            "timezone": "Etc/UTC",
            "theme": "dark",
            "style": "2",
            "locale": "en",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "hide_top_toolbar": true,
            "allow_symbol_change": true,
            "container_id": "tradingview_73d23"
        }
    );
    changeSymbol(symbol);

    function changeSymbol(newSymbol, btnId) {
        const btnIds = ['eth-btn', 'bch-btn', 'btc-btn'];

        btnIds.map(btn => {
            if (btn !== btnId) {
                document.getElementById(btn).classList.add('none-active');
                document.getElementById(btn).classList.remove('clickedBtn');
            }
            document.getElementById(btnId).classList.add('clickedBtn');
            document.getElementById(btnId).classList.remove('none-active');
        })
        new TradingView.widget(
            {
                "width": "100%",
                "height": 610,
                "symbol": newSymbol,
                "interval": "D",
                "timezone": "Etc/UTC",
                "theme": "dark",
                "style": "2",
                "locale": "en",
                "toolbar_bg": "#f1f3f6",
                "enable_publishing": false,
                "hide_top_toolbar": true,
                "allow_symbol_change": true,
                "container_id": "tradingview_73d23"
            }
        );
        document.getElementById('chart-name').innerText = chartNames[newSymbol];
    }
</script>
