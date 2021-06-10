<template>
    <div :class="statuses[status].className">
        <i class="fas mr-1" :class="statuses[status].icon"></i>
        <span v-if="displayText" :class="statuses[status].className">
            {{ statuses[status].text }}
        </span>
    </div>
</template>

<script>
export default {
    name: "TableStatusBlock",
    props: {
        status: {
            required: true,
            type: String
        },
        displayText: {
            default: false,
            type: Boolean,
            required: false
        }
    },
    data: () => ({
        statuses: {
            approved: {
                className: 'status-approved',
                icon: 'fa-check',
                text: 'Approved'
            },
            processing: {
                className: 'status-processing',
                icon: 'fa-clock',
                text: 'Processing'
            },
            failed: {
                className: 'status-failed',
                icon: 'fa-ban',
                text: 'Failed'
            },
        }
    }),
}
</script>

<style scoped>

</style>
