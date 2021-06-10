<template>
    <div class="currency-item row mx-0">
        <div class="row text-center align-items-center mx-0">
            <div class="w-20">
                <img src="images/btc.jpg" width="100%"/>
            </div>
            <div class="w-20 align-items-center">
                <img class="d-inline-block logo-img" src="images/bch-logo.png"/>
                <span class="d-inline-block">Bitcoin</span>
            </div>
            <div class="w-40">
                <div class="wallet-info wallet-info-dark">
                    <input
                        type="text"
                        id="bch_wallet_key"
                        v-model="wallet.address"
                        readonly
                    >
                    <i class="wallet-dots text-white">...</i>
                    <i class="fas fa-copy" @click="onCopyKey('bch_wallet_key')"></i>
                    <span class="copied" v-if="copied">Copied to clipboard</span>
                </div>
            </div>
            <div class="w-20 text-right">
                <span class="font-16">{{ wallet.amount.toFixed(7) }} BCH</span>
                <span class="usd font-12">123.23 $</span>
            </div>
        </div>
    </div>
</template>

<script>
import copyMixin from "../../../mixins/copyMixin";
export default {
    name: "BitcoinCashBlock",
    mixins: [copyMixin],
    props: ['wallet']
}
</script>

<style scoped>

</style>
