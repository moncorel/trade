<template>
    <div>
        <table class="wow slideInRight personal-data-table mt-5 w-100">
            <thead>
                <tr>
                    <th>Pairs</th>
                    <th>Coin</th>
                    <th>Last Price</th>
                    <th>24h Change</th>
                    <th>24h High</th>
                    <th>24h Low</th>
                </tr>
            </thead>
            <tbody v-if="connected">
                <tr>
                <td class="font-16">BTC/USD</td>
                <td class="font-16">Bitcoin</td>
                <td>
                    <b class="font-16" :class="this.resultData['BTCUSDT'].direction">
                        {{ this.resultData['BTCUSDT'].price }}
                    </b>
                    <br>
                    <i>{{ this.resultData['BTCUSDT'].price }} $</i>
                </td>
                <td>
                    <b class="font-16" :class="{ 'decrease' : this.resultData['BTCUSDT'].change < 0,
                     'increase': this.resultData['BTCUSDT'].change > 0 }">
                        {{ this.resultData['BTCUSDT'].change }}%
                    </b>
                </td>
                <td><b class="font-16">{{ this.resultData['BTCUSDT'].high }}</b></td>
                <td><b class="font-16">{{ this.resultData['BTCUSDT'].low }}</b></td>
            </tr>
                <tr>
                    <td class="font-16">ETH/USD</td>
                    <td class="font-16">Ethereum</td>
                    <td>
                        <b class="font-16" :class="this.resultData['ETHUSDT'].direction">
                            {{ this.resultData['ETHUSDT'].price }}
                        </b>
                        <br>
                        <i>{{ this.resultData['ETHUSDT'].price }} $</i>
                    </td>
                    <td>
                        <b class="font-16" :class="{ 'decrease' : this.resultData['ETHUSDT'].change < 0,
                         'increase': this.resultData['ETHUSDT'].change > 0 }">
                            {{ this.resultData['ETHUSDT'].change }}%
                        </b>
                    </td>
                    <td><b class="font-16">{{ this.resultData['ETHUSDT'].high }}</b></td>
                    <td><b class="font-16">{{ this.resultData['ETHUSDT'].low }}</b></td>
                </tr>
                <tr>
                    <td class="font-16">ETH/BTC</td>
                    <td class="font-16">Ethereum</td>
                    <td>
                        <b class="font-16" :class="this.resultData['BCHUSDT'].direction">
                            {{ this.resultData['BCHUSDT'].price }}
                        </b>
                        <br>
                        <i>{{ this.resultData['BCHUSDT'].price }} $</i>
                    </td>
                    <td>
                        <b class="font-16" :class="{ 'decrease' : this.resultData['BCHUSDT'].change < 0,
                     'increase': this.resultData['BCHUSDT'].change > 0 }">
                            {{ this.resultData['BCHUSDT'].change }}%
                        </b>
                    </td>
                    <td><b class="font-16">{{ this.resultData['BCHUSDT'].high }}</b></td>
                    <td><b class="font-16">{{ this.resultData['BCHUSDT'].low }}</b></td>
                </tr>
            </tbody>
        </table>
        <div class="spinner-wrapper d-block w-100 text-center" v-if="!connected">
            <div class="spinner-border text-light" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="mobile-currencies">
            <mobile-currency-block
                v-if="resultData.BTCUSDT.price"
                currency-name="Bitcoin"
                currency-pair="BTC/USD"
                :currency="resultData.BTCUSDT"
            >
            </mobile-currency-block>

            <mobile-currency-block
                v-if="resultData.ETHUSDT.price"
                currency-name="Ethereum"
                currency-pair="ETH/USD"
                :currency="resultData.ETHUSDT"
            >
            </mobile-currency-block>

            <mobile-currency-block
                v-if="resultData.BCHUSDT.price"
                currency-name="BitcoinCash"
                currency-pair="BCH/USD"
                :currency="resultData.BCHUSDT"
            >
            </mobile-currency-block>
        </div>
    </div>
</template>


<script>
import MobileCurrencyBlock from "./MobileCurrencyBlock";
export default {
    components: {
        MobileCurrencyBlock
    },
    name: "RealTimeTable",
    data: () => ({
        connected: false,
        resultData: {
            BTCUSDT: {
                high: '',
                low: '',
                change: '',
                price: '',
                direction: ''
            },
            ETHUSDT: {
                high: '',
                low: '',
                change: '',
                price: '',
                direction: ''
            },
            BCHUSDT: {
                high: '',
                low: '',
                change: '',
                price: '',
                direction: ''
            }
        }
    }),
    mounted() {
        const connection = new WebSocket(`wss://stream.binance.com:9443/stream?streams=!ticker@arr@3000ms`);

        const coins = ['BTCUSDT', 'ETHUSDT', 'BCHUSDT'];

        const self = this;

        this.connected = false;

        connection.onmessage = function(event) {
            const result = JSON.parse(event.data);
            result.data.forEach(data => {
                if (coins.includes(data.s)) {
                    const result = {
                        ...self.resultData,
                        [data.s]: {
                            high: Number(data.h).toFixed(2),
                            low: Number(data.l).toFixed(2),
                            change: Number(data.P).toFixed(2),
                            price: Number(data.c).toFixed(2)
                        }
                    };
                    if (self.resultData[data.s].price < result[data.s].price) {
                        result[data.s].direction = 'up';
                    } else if (self.resultData[data.s].price > result[data.s].price) {
                        result[data.s].direction = 'down';
                    }
                    self.resultData = {
                        ...result
                    }
                    self.connected = true;
                }
            });
        }
    }
}
</script>

<style scoped>
.mobile-currencies {
    display: none;
}
@media (max-width: 768px) {
    table {
        display: none;
    }
    .mobile-currencies {
        display: block;
    }
}
</style>
