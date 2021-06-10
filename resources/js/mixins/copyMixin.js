export default {
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
