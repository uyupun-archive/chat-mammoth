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
            <div class="cp-Tag_Add row">
                <label class="cp-Tag_Title" for="tag">タグの追加</label>
                <div class="col-xs-9">
                    <input id="tag" type="text" name="tag" class="cp-TextBox_Tag form-control" v-model="tag" @keyup="isDisabled()" :disabled="tagState">
                </div>
                <div class="col-xs-3">
                    <button type="button" class="st-Button cp-Tag_Button cp-Add" @click="addTag(tag)" :disabled="addState">追加</button>
                    <button type="button" class="st-Button cp-Tag_Button cp-Delete" @click="deleteTag()" :disabled="deleteState">削除</button>
                </div>
            </div>
            <div class="cp-Tag_Area">
                <span class="st-Tag" v-for="tag in tags">{{ tag }}</span>
            </div>
            <div class="cp-Item_Area">
                <label class="cp-Item_Title">公開設定</label>
                <div class="cp-RadioBox_Area">
                    <div class="cp-Public_Area">
                        <input type="radio" name="publish" id="public" value="public" class="cp-RadioBox_Public" checked required v-model="publish">
                        <label for="public" class="cp-ChatRoom_Public">公開</label>
                    </div>
                    <div class="cp-Private_Area">
                        <input type="radio" name="publish" id="private" value="private" class="cp-RadioBox_Private" required v-model="publish">
                        <label for="private" class="cp-ChatRoom_Private">非公開</label>
                    </div>
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
                addState: true,
                deleteState: true,
                tagState: false,
            }
        },
        methods: {
            addTag(tag) {
                this.tags.push(tag)
                this.tag = ''
                this.addState = true

                if (this.tags.length > 4) {
                    this.tagState = true
                }

                if (this.tags.length > 0) {
                    this.deleteState = false
                } else {
                    this.deleteState = true
                }
            },
            deleteTag() {
                this.tags.pop()

                if (this.tags.length > 0) {
                    this.deleteState = false
                } else {
                    this.deleteState = true
                }
            },
            isDisabled() {
                if (this.tag.length > 0) {
                    this.addState = false
                } else {
                    this.addState = true
                }

                console.log(this.tags.length)
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