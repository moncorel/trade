<template>
    <div>
        <form method="POST" @submit.prevent="onSubmit">
            <div class="form-check my-4 row" @click="onClickRadioBlock">
                <div class="col-6 col-lg-2 mr-4 pl-0" @click="checkSeller">
                    <input
                        class="form-check-input d-none"
                        type="radio"
                        name="deal_type"
                        id="seller"
                        value="seller"
                        ref="seller-input"
                    >
                    <label
                        class="form-check-label cursor-pointer text-white font-16"
                        for="seller"
                    >
                        <i class="far fa-dot-circle color-primary"
                           ref="seller-checked-icon"
                        ></i>
                        <i class="far fa-circle color-primary d-none"
                           ref="seller-not-checked-icon"
                        ></i>
                        Seller
                    </label>
                </div>
                <div class="col-6 col-lg-2 pl-0 cursor-pointer" @click="checkBuyer">
                    <input
                        class="form-check-input d-none"
                        type="radio"
                        name="deal_type"
                        id="buyer"
                        value="buyer"
                        ref="buyer-input"
                    >
                    <label
                        class="form-check-label cursor-pointer text-white font-16"
                        for="buyer"
                    >
                        <i class="far fa-dot-circle color-primary d-none"
                           ref="buyer-checked-icon"
                        ></i>
                        <i class="far fa-circle color-primary"
                           ref="buyer-not-checked-icon"
                        ></i>
                        Buyer
                    </label>
                </div>
            </div>
            <div class="form-group mb-4">
                <label class="text-white font-16" for="second_party_nickname">
                    <i class="fas fa-user-tag"></i>
                    Second Party nickname
                </label>
                <input type="text"
                       name="second_party_nickname"
                       id="second_party_nickname"
                       v-model="second_party_nickname"
                       class="form-control">
<!--                <small class="text-danger" v-if="errors['second_party_nickname']">-->
<!--                    <strong>{{ errors['second_party_nickname'] }}</strong>-->
<!--                </small>-->
            </div>
            <div class="form-group mb-4">
                <label class="text-white font-16" for="deal_conditions">
                    <i class="fas fa-file-alt"></i>
                    Deal Conditions
                </label>
                <textarea
                    class="form-control"
                    id="deal_conditions"
                    rows="3"
                    name="deal_conditions"
                    v-model="deal_conditions"
                ></textarea>
            </div>
            <div class="row mx-0">
                <div class="col-6 pl-0">
                    <div class="form-group mb-4">
                        <label class="text-white font-16">
                            <i class="fas fa-stopwatch"></i>
                            Deal's Deadline
                        </label>
                        <date-picker
                            id="deadline"
                            v-model="deadline"
                            type="datetime"
                            placeholder="Select deadline"
                            class="w-100"
                            valueType="format"
                            :editable="false"
                            popup-class="float-left"
                        ></date-picker>
                    </div>
                </div>
                <div class="col-6 pr-0">
                    <div class="form-group mb-4">
                        <label class="text-white font-16" for="currency">
                            <i class="fas fa-coins"></i>
                            Currency
                        </label>
                        <select name="currency" id="currency" v-model="currency">
                            <option value="btc" selected>Bitcoin</option>
                            <option value="eth">Ethereum</option>
                            <option value="bch">Bitcoin Cash</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="text-white font-16" for="amount">
                    <i class="fas fa-sort-numeric-up"></i>
                    Amount
                </label>
                <input type="text"
                       name="amount"
                       id="amount"
                       v-model="amount"
                       class="form-control mb-4 text-right"
                >
            </div>
            <div class="form-group d-none" id="deal-password-block">
                <label class="text-white font-16" for="deal_password">
                    <i class="fas fa-lock"></i>
                    Password to complete the deal
                </label>
                <input type="password"
                       name="deal_password"
                       id="deal_password"
                       v-model="deal_password"
                       class="form-control mb-4 text-right"
                >
            </div>
            <input
                type="submit"
                value="Create a Secured Deal request"
                class="activeBtn d-block w-100"
            >
        </form>
    </div>
</template>

<script>
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
import axios from 'axios';
export default {
    name: "SecuredDealForm",
    components: {
        DatePicker
    },
    data: () => ({
        deadline: null,
        type: 'seller',
        currency: '',
        deal_password: '',
        amount: 0.01,
        deal_conditions: '',
        second_party_nickname: ''
    }),
    methods: {
        async onSubmit() {
            try {
                await axios.post('/personal/secured-deal', {
                    deal_type: this.type,
                    deadline: this.deadline,
                    currency: this.currency,
                    deal_password: this.deal_password,
                    amount: this.amount,
                    deal_conditions: this.deal_conditions,
                    second_party_nickname: this.second_party_nickname,
                });
            } catch (error) {
                console.log(error);
            }
        },
        checkBuyer() {
            this.type = 'buyer';
            this.$refs['buyer-input'].checked = true;
            this.$refs['seller-input'].checked = false;
        },
        checkSeller() {
            this.type = 'seller';
            this.$refs['seller-input'].checked = true;
            this.$refs['buyer-input'].checked = false;
        },
        onClickRadioBlock() {
            const buyerInput = this.$refs['buyer-input'];
            if (buyerInput.checked) {
                this.$refs['seller-checked-icon'].classList.add('d-none');
                this.$refs['seller-not-checked-icon'].classList.remove('d-none');
                this.$refs['buyer-not-checked-icon'].classList.add('d-none');
                this.$refs['buyer-checked-icon'].classList.remove('d-none');
            } else {
                this.$refs['seller-checked-icon'].classList.remove('d-none');
                this.$refs['seller-not-checked-icon'].classList.add('d-none');
                this.$refs['buyer-not-checked-icon'].classList.remove('d-none');
                this.$refs['buyer-checked-icon'].classList.add('d-none');
            }
        }
    }
}
</script>

<style scoped>

</style>
