<template>
    <div>
        <div class="cp-Create_ChatRoom">
            <div class="cp-Item_Area">
                <label for="name" class="cp-Item_Title">ルーム名</label>
                <input type="text" name="name" id="name" class="cp-TextBox_Name form-control" required autofocus minlength="1" maxlength="32" v-model="name">
            </div>
            <div class="cp-Item_Area">
                <label for="description" class="cp-Item_Title">ルームの説明</label>
                <textarea name="description" id="description" class="cp-TextArea_Description form-control" required minlength="1" maxlength="512" v-model="description"></textarea>
            </div>
            <div class="cp-Item_Area">
                <div class="cp-Item_Area">
                    <div class="cp-Item_Title">タグの追加</div>
                    <input type="text" name="tag" class="cp-TextBox_Tag form-control" v-model="tag" @keyup="isDisabled()" :disabled="tagState">
                    <button type="button" class="st-Button cp-Tag_Button" @click="addTag(tag)" :disabled="btnState">追加</button>
                    <div class="cp-Tag_Area">
                        <span class="st-Tag" v-for="tag in tags">{{ tag }}</span>
                    </div>
                </div>
                <div class="cp-Item_Title">公開設定</div>
                <div class="cp-Public_Area">
                    <input type="radio" name="publish" id="public" value="public" class="cp-RadioBox_Public" checked required v-model="publish">
                    <label for="public" class="cp-Chatroom_public">公開</label>
                </div>
                <div class="cp-Private_Area">
                    <input type="radio" name="publish" id="private" value="private" class="cp-RadioBox_Private" required v-model="publish">
                    <label for="private" class="cp-Chatroom_private">非公開</label>
                </div>
            </div>
            <div class="cp-Button_Area">
                <button type="button" class="st-Button cp-Button" @click="send()">作成</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                description: '',
                publish: '',
                tags: [],
                tag: '',
                btnState: true,
                tagState: false,
            }
        },
        methods: {
            addTag(tag) {
                this.tags.push(tag)
                this.tag = ''
                this.btnState = true

                if (this.tags.length > 4) {
                    this.tagState = true
                }
            },
            isDisabled() {
                if (this.tag.length > 0) {
                    this.btnState = false
                } else {
                    this.btnState = true
                }
            },
            send() {
                axios.post('/api/room/store', {
                    name: this.name,
                    description: this.description,
                    publish: this.publish,
                    tags: this.tags
                })
                    .then(response => {
                        location = '/mypage'
                    })
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