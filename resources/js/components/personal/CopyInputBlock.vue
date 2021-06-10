<template>
    <div class="wallet-info" :class="{ 'wallet-info-dark': dark, 'wallet-info-light': !dark }">
        <input
            :id="elementId"
            type="text"
            :class="'p-' + padding"
            :value="text"
            readonly
        >
        <i class="wallet-dots">...</i>
        <i class="fas fa-copy color-primary" @click="onCopyKey"></i>
        <span class="copied" v-if="copied">Copied to clipboard</span>
    </div>
</template>

<script>
export default {
    name: "CopyInputBlock",
    data: () => ({
       copied: false
    }),
    props: {
        padding: {
            default: 0
        },
        dark: {
            type: Boolean,
            default: false
        },
        elementId: {
            required: true,
            type: String
        },
        text: {
            required: true
        }
    },
    methods: {
        onCopyKey() {
            const keyInput = document.getElementById(this.elementId);
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

<style scoped>

</style>
