<template>
    <div>
        <textarea name="comment" placeholder="Please write here." class="rp-TextArea" id="rp-TextArea" autofocus required minlength="1" maxlength="1000" v-model="text" @input="changeState()" @keydown="sendHandler($event)"></textarea>
        <div class="rp-Form_Other d-flex">
            <input type="checkbox" id="markdown" name="markdown">
            <label class="rp-Markdown" for="markdown">マークダウン</label>
            <button type="submit" class="st-Button rp-Button" :disabled="state" @click="state = !state">マサカる</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                state: true,
                text: '',
            }
        },
        methods: {
            changeState() {
                this.text.length > 0 ? this.state = false : this.state = true
            },
            sendHandler(e) {
                if ((e.metaKey || e.ctrlKey) && e.keyCode == 13) {
                    e.target.form.submit()
                }
            }
        },
    }
</script>