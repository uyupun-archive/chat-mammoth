<template>
    <div>
        <div class="rp-Form_Other d-flex">
            <button type="submit" class="st-Button rp-Button" :disabled="state" @click="state = !state">マサカる</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                state: false,
            }
        },
    }
</script>