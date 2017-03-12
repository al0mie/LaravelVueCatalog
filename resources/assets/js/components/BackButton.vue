<template>
    <button class="button is-large is-primary is-fullwidth has-text-centered" @click="back">
        Back
    </button>
</template>

<script>
    export default {
        methods: {
            back() {
                window.history.back();
            }
        }
    }

</script>