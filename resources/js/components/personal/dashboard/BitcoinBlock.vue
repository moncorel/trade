<template>
    <div class="currency-item row mx-0">
        <div class="row text-center align-items-center mx-0">
            <div class="w-20">
                <img src="images/btc.jpg" width="100%"/>
            </div>
            <div class="w-20 align-items-center">
                <img class="d-inline-block logo-img" src="images/btc-logo.png"/>
                <span class="d-inline-block">Bitcoin</span>
            </div>
            <div class="w-40">
                <div class="wallet-info wallet-info-dark">
                    <input
                        type="text"
                        id="btc_wallet_key"
                        v-model="wallet.address"
                        readonly
                    >
                    <i class="wallet-dots text-white">...</i>
                    <i class="fas fa-copy" @click="onCopyKey('btc_wallet_key')"></i>
                    <span class="copied" v-if="copied">Copied to clipboard</span>
                </div>
            </div>
            <div class="w-20 text-right">
                <span class="font-16">{{ wallet.amount.toFixed(7) }} BTC</span>
                <span class="usd font-12">{{ totalAmount }} $</span>
            </div>
        </div>
    </div>
</template>

<script>
import copyMixin from "../../../mixins/copyMixin";
export default {
    name: "BitcoinBlock",
    mixins: [copyMixin],
    props: ['wallet', 'course'],
    computed: {
        totalAmount() {
            return (this.wallet.amount * this.course).toFixed(2);
        }
    }
}
</script>

<style scoped>

</style>
