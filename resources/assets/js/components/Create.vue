<template>
    <div>
        <div class="cp-Item_Area">
            <div class="cp-Item_Title">タグの追加</div>
            <input type="text" name="tag" class="cp-TextBox_Tag form-control" v-model="tag" @keyup="isDisabled()">
            <button type="button" class="st-Button cp-Tag_Button" @click="addTag(tag)" :disabled="disabled">追加</button>
            <div class="cp-Tag_Area">
                <span class="st-Tag" v-for="tag in tags">{{ tag }}</span>
            </div>
        </div>
        <div class="cp-Item_Title">公開設定</div>
        <div class="cp-Public_Area">
            <input type="radio" name="publish" id="public" value="public" class="cp-RadioBox_Public" checked required>
            <label for="public" class="cp-Chatroom_public">公開</label>
        </div>
        <div class="cp-Private_Area">
            <input type="radio" name="publish" id="private" value="private" class="cp-RadioBox_Private" required>
            <label for="private" class="cp-Chatroom_private">非公開</label>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tags: [],
                tag: '',
                disabled: true,
            }
        },
        methods: {
            addTag(tag) {
                this.tags.push(tag)
                this.tag = ''
            },
            isDisabled() {
                if (this.tag.length > 0) {
                    this.disabled = false
                } else {
                    this.disabled = true
                }
            }
        }
    }
</script>

<style lang="scss">
    .cp-Tag_Button {
        cursor: pointer;
        
        &:disabled {
            cursor: not-allowed;
        }
    }

    .st-Tag {
        display: inline-block;

        &:not(:last-child) {
            margin-right: 5px;
        }
    }
</style>