<template>
    <div class="row mobile-table mx-0">
        <div class="col-12 row mobile-table-row mx-0">
            <div class="col-6 mobile-table-th">Pairs</div>
            <div class="col-6 mobile-table-td">{{ currencyPair }}</div>
        </div>
        <div class="col-12 row mobile-table-row mx-0">
            <div class="col-6 mobile-table-th">Coin</div>
            <div class="col-6 mobile-table-td">{{ currencyName }}</div>
        </div>
        <div class="col-12 row mobile-table-row mx-0">
            <div class="col-6 mobile-table-th">PaiLast Pricers</div>
            <div class="col-6 mobile-table-td">
                <b class="font-16" :class="currency.direction">
                    {{ currency.price }}
                </b>
                <br>
                <span class="font-12 text-black">{{ currency.price }} $</span>
            </div>
        </div>
        <div class="col-12 row mobile-table-row mx-0">
            <div class="col-6 mobile-table-th">24h Change</div>
            <div class="col-6 mobile-table-td">
                <b class="font-16" :class="{ 'decrease' : currency.change < 0,
                     'increase': currency.change > 0 }">
                    <span v-if="currency.change > 0" class="increase">+</span>
                    {{ currency.change }} %
                </b>
            </div>
        </div>
        <div class="col-12 row mobile-table-row mx-0">
            <div class="col-6 mobile-table-th">24h High</div>
            <div class="col-6 mobile-table-td">
                <strong>{{ currency.high }}</strong>
            </div>
        </div>
        <div class="col-12 row mobile-table-row mx-0">
            <div class="col-6 mobile-table-th">24h Low</div>
            <div class="col-6 mobile-table-td">
                <strong>{{ currency.low }}</strong>
            </div>
        </div>
    </div>
</template>

<script>
export default {
name: "MobileCurrencyBlock",
    props: {
        currency: {
            type: Object,
            required: true
        },
        currencyPair: {
            type: String,
            required: true
        },
        currencyName: {
            type: String,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
