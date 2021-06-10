<template>
    <div class="currency-item row mx-0">
        <div class="row text-center align-items-center mx-0">
            <div class="w-20">
                <div class="tradingview-widget-container" :id="currencyType + '_widget'">
                    <div class="tradingview-widget-container__widget"></div>
                </div>
            </div>
            <div class="w-20 align-items-center">
                <img
                    class="d-inline-block logo-img"
                    :src="'images/' + currencyType + '-logo.png'"
                />
                <span class="d-inline-block">{{ currencyName }}</span>
            </div>
            <div class="w-40">
                <div class="wallet-info wallet-info-dark">
                    <input
                        type="text"
                        :id="currencyType + '_wallet_key'"
                        v-model="wallet.address"
                        class="pl-0"
                        readonly
                    >
                    <i class="wallet-dots text-white">...</i>
                    <i class="fas fa-copy" @click="onCopyKey(currencyType + '_wallet_key')"></i>
                    <span class="copied" v-if="copied">Copied to clipboard</span>
                </div>
            </div>
            <div class="w-20 text-right">
                <span class="font-16">{{ wallet.amount.toFixed(7) }} {{ currencyType.toUpperCase() }}</span>
                <span class="usd font-12">{{ totalAmount }} $</span>
            </div>
        </div>
        <div class="row text-center align-items-center mx-0">
            <div class="row mx-0">
                <div class="col-6 text-left">
                    <div class="col-12">
                        <div class="align-items-center">
                            <img
                                class="d-inline-block logo-img"
                                :src="'images/' + currencyType + '-logo.png'"
                            />
                            <span class="d-inline-block">{{ currencyName }}</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="">
                            <span class="font-16">{{ wallet.amount.toFixed(7) }} {{ currencyType.toUpperCase() }}</span>
                            <span class="usd font-12">{{ totalAmount }} $</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mt-2">
                    <div class="">
                        <div class="tradingview-widget-container" :id="currencyType + '_widget_mobile'">
                            <div class="tradingview-widget-container__widget"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-0 mt-3">
                <div class="col-12">
                    <div class="wallet-info wallet-info-dark">
                        <input
                            type="text"
                            :id="currencyType + '_wallet_key'"
                            v-model="wallet.address"
                            class="pl-0"
                            readonly
                        >
                        <i class="wallet-dots text-white">...</i>
                        <i class="fas fa-copy" @click="onCopyKey(currencyType + '_wallet_key')"></i>
                        <span class="copied" v-if="copied">Copied to clipboard</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { getConfig } from "../../../widgets/config";

export default {
    name: "CryptoCurrencyBlock",
    props: [
        'wallet',
        'course',
        'currencyType',
        'currencyName',
    ],
    computed: {
        totalAmount() {
            return (this.wallet.amount * this.course).toFixed(2);
        }
    },
    mounted() {
        let chartScript = document.createElement('script');
        chartScript.setAttribute('src', 'https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js');
        let config = getConfig(this.currencyType);
        chartScript.innerHTML = JSON.stringify(config);
        document.getElementById(this.currencyType + '_widget').appendChild(chartScript);
        chartScript = document.createElement('script');
        chartScript.setAttribute('src', 'https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js');
        config = getConfig(this.currencyType);
        chartScript.innerHTML = JSON.stringify(config);
        document.getElementById(this.currencyType + '_widget_mobile').appendChild(chartScript);
    },
    data: () => ({
        copied: false,
    }),
    methods: {
        onCopyKey(elementId) {
            const keyInput = document.getElementById(elementId);
            keyInput.select();
            document.execCommand("copy");
            this.copied = true;
            setTimeout(() => {
                this.copied = false;
            }, 2000);
        }
    }
}
</script>

<style>
.currency-item > div:last-child {
    display: none;
}

.currency-item > div:first-child {
    display: flex;
}

@media (max-width: 992px) {
    .currency-item > div:last-child {
        display: block;
    }
    .currency-item > div:first-child {
        display: none;
    }
}
</style>
