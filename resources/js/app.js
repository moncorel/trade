require('./bootstrap');

import Vue from 'vue';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('real-time-table', require('./components/main/RealTimeTable.vue').default);

Vue.component('crypto-chart', require('./components/personal/dashboard/CryptoChart.vue').default);
Vue.component('crypto-currency-block', require('./components/personal/dashboard/CryptoCurrencyBlock.vue').default);
Vue.component('bitcoin-block', require('./components/personal/dashboard/BitcoinBlock.vue').default);
Vue.component('ethereum-block', require('./components/personal/dashboard/EthereumBlock.vue').default);
Vue.component('bitcoin-cash-block', require('./components/personal/dashboard/BitcoinCashBlock.vue').default);
Vue.component('copy-input-block', require('./components/personal/CopyInputBlock.vue').default);
Vue.component('status-block', require('./components/personal/StatusBlock.vue').default);
Vue.component('secured-deal-form', require('./components/secured-deal/SecuredDealForm.vue').default);

const app = new Vue({
    el: '#app',
});
