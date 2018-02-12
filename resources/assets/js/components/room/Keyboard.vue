<template>
    <div>
        <textarea name="comment" placeholder="Please write here." class="rp-TextArea" autofocus required minlength="1" maxlength="1000" v-model="text" @keyup="changeState()"></textarea>
        <div class="rp-Form_Other d-flex">
            <input type="checkbox" id="markdown" name="markdown">
            <label for="markdown">マークダウン</label>
            <button type="submit" class="st-Button rp-Button" :disabled="state">投稿する</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                state: true,
                text: ''
            }
        },
        methods: {
            changeState() {
                this.text.length > 0 ? this.state = false : this.state = true
            }
        }
    }
</script>